<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

use App\Models\User;

use App\Http\Requests\SubmitUserRequest;
use App\Http\Requests\UpadatePasswordUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    // inisialisasi title untuk setiap halaman
    private $title;

    public function __construct()
    {
        $this->title = "User";
    }


    public function userIndex() : View
    {
        $pagetitle = $this->title;
        $users = User::with(['roles' => function($query) {
            $query->select('role.id_role','nama_role','role.id_company')->with(['company' => function($query) {
                $query->select('company.id_company','nama_company');
            }]);
        }])->get();
        return view('master.user.user_index',compact('users','pagetitle'));
    }

    public function userAdd() : View
    {
        $pagetitle = $this->title;
        return view('master.user.user_add',compact('pagetitle'));
    }

    public function userSubmit(SubmitUserRequest $request) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        $ipAddress = $request->ip();

        $validatedRequest["password"] = bcrypt( $validatedRequest["password"]);
        $validatedRequest["flagaktif_user"] = 1;

        $input = "add";

        $defaultProperty = $this->defaultProperty($ipAddress, $input);

        $mergedData = array_merge($validatedRequest, $defaultProperty);

        try
        {
            $user = User::create($mergedData);
        }catch(Exception $e)
        {
            return $e->getMessage();
        }

        return redirect()->route('userIndex')->with('status', 'User created.');
    }

    public function userEdit($id) : View
    {
        $pagetitle = $this->title;
        $user = User::findOrFail($id);
        $userroles = $user->roles->pluck('id_role')->toArray();

        $datauser= $this->get_user($user->m_createuser,$user->m_updateuser);
        $roles = RoleModel::with('company')->get();

        return view('master.user.user_edit', compact('user','pagetitle', 'datauser', 'roles','userroles'));
    }

    public function userUpdate(UpdateUserRequest $request,$id) : RedirectResponse
    {
        $validatedRequest = $request->validated();
        $ipAddress = $request->ip();
        $input = "edit";

        $defaultProperty = $this->defaultProperty($ipAddress, $input);

        $mergedData = array_merge($validatedRequest, $defaultProperty);

        try
        {
            $user = User::find($id);
            $userRolesNow = $user->roles->pluck('id_role')->toArray();

            if(isset($validatedRequest['roles']) && $validatedRequest['roles'] != $userRolesNow){
                $user->roles()->sync($validatedRequest['roles']);
            } else {
                $user->roles()->detach();
            }

            $userUpdated =$user->update($mergedData);
        }catch(Exception $e)
        {
            return $e->getMessage();
        }

        return redirect()->route('userIndex')->with('status','User updated.');
    }

    public function userUpdatePassword(UpadatePasswordUserRequest $request, $id)
    {
        $validatedRequest = $request->validated();

        if ($validatedRequest["password_user_baru"] !== $validatedRequest["konfirmasi_password_user_baru"]) {
            return redirect()->back()->with('fail_update_password','Update password User gagal. Konfirmasi password salah.');
        }

        $ipAddress = $request->ip();

        $validatedRequest["password"] = bcrypt( $validatedRequest["password_user_baru"]);

        unset($validatedRequest["password_user_baru"]);
        unset($validatedRequest["konfirmasi_password_user_baru"]);

        $input = "edit";

        $defaultProperty = $this->defaultProperty($ipAddress, $input);

        $mergedData = array_merge($validatedRequest, $defaultProperty);

        try
        {
            $user = User::where('id_user',$id)->update($mergedData);
        }catch(Exception $e)
        {
            return $e->getMessage();
        }

        return redirect()->back()->with('success_update_password','Password user updated.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
