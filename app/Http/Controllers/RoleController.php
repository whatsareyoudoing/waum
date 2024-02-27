<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleSubmitRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Company;
use App\Models\RoleModel;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    private $title;

    public function __construct()
    {
        $this->title = 'Role';
    }

    public function roleIndex()
    {
        $pagetitle = $this->title;
        $roles = RoleModel::with('company')->get();
        return view('master.role.role_index', compact('pagetitle', 'roles'));
    }

    public function roleAdd(): View
    {
        $pagetitle = $this->title;
        $companys = Company::get();
        return view('master.role.role_add', compact('pagetitle','companys'));
    }

    public function roleSubmit(RoleSubmitRequest $request): RedirectResponse
    {
        $validatedRequest = $request->validated();

        $ipAddress = $request->ip();

        $input = "add";

        $defaultProperty = $this->defaultProperty($ipAddress, $input);

        $mergedData = array_merge($validatedRequest, $defaultProperty);

        try {
            $role = RoleModel::create($mergedData);
        }catch(Exception $e) {
            return redirect()->back()->with('fail_create','Fail when create role.');
        }

        return redirect()->route('roleIndex')->with('success_create','Role created.');
    }

    public function roleEdit($id): View
    {
        $pagetitle = $this->title;
        $role = RoleModel::findOrFail($id);
        $companys = Company::get();
        $datauser= $this->get_user($role->m_createuser,$role->m_updateuser);
        return view('master.role.role_edit', compact('role','companys','pagetitle', 'datauser'));
    }

    public function roleUpdate(RoleUpdateRequest $request, $id): RedirectResponse
    {
        $validatedRequest = $request->validated();

        $ipAddress = $request->ip();

        $input = "edit";

        $defaultProperty = $this->defaultProperty($ipAddress, $input);

        $mergedData = array_merge($validatedRequest, $defaultProperty);

        try {
            $role = RoleModel::where('id_role', $id)->update($mergedData);
        }catch(Exception $e) {
            return redirect()->back()->with('fail_update','Fail when update role.');
        }

        return redirect()->route('roleIndex')->with('success_update','Role updated.');
    }
}
