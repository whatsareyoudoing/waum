<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\MenuModel;
use App\Models\MenuRoleModel;
use App\Models\RoleModel;
use App\Models\Business;
use App\Models\ApplicationModel;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    public function __construct()
    {
        $this->title = "Menu";
    }

    public function menuIndex() : View
    {
        $pagetitle = $this->title;
        $menus = MenuModel::with('applications')->get();
        return view('transaksi.menu.menu_index', compact('menus', 'pagetitle'));
    }

    public function menuAdd() : View
    {
        $application=ApplicationModel::get();
        $pagetitle = $this->title;
        return view('transaksi.menu.menu_add',compact('application','pagetitle'));
    }

    public function menuSubmit(SubmitMenuRequest $request) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        // kirim parameter ip dan input
        $ipAddress = $request->ip();
        $input = "add";

        $defaultProperty = $this->defaultProperty($ipAddress, $input);

        $mergedData = array_merge($validatedRequest, $defaultProperty);

        try
        {
            $menu = MenuModel::create($mergedData);

        }catch(Exception $e)
        {
            return $e->getMessage();
        }

        return redirect()->route('menuIndex')->with('status', 'Menu created.');
    }

    public function menuEdit($id) : View
    {
        $pagetitle = $this->title;
        $menu = MenuModel::findOrFail($id);
        $application=ApplicationModel::get();
        $role = RoleModel::with('menurole')->get();
        return view('transaksi.menu.menu_edit',compact('role','menu','application','pagetitle'));
    }

    public function menuUpdate(UpdateMenuRequest $request,$id) : RedirectResponse
    {

        $validatedRequest = $request->validated();

        // kirim parameter ip dan input
        $ipAddress = $request->ip();
        $input = "edit";

        $defaultProperty = $this->defaultProperty($ipAddress, $input);

        $mergedData = array_merge($validatedRequest, $defaultProperty);

        try
        {
            $menuUpdated = MenuModel::where('id_menu',$id)->update($mergedData);
        }catch(Exception $e)
        {
            return $e->getMessage();
        }

        return redirect()->route('menuIndex')->with('status','Menu updated.');
    }

    public function menuRole(Request $request,$id) : RedirectResponse
    {
        MenuRoleModel::query()->delete();

        $data = $request->input('input_array');
        foreach ( $data as $d ){
            MenuRoleModel::create($d);


        }

        return redirect()->route('menuIndex')->with('status','Menu Role updated.');
    }
}
