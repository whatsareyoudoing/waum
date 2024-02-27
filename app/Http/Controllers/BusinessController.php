<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\Business;

use App\Http\Requests\SubmitBusinessRequest;
use App\Http\Requests\UpdateBusinessRequest;

class BusinessController extends Controller
{
    public function __construct()
    {
        $this->title = "Business";
    }
    public function businessIndex() : View
    {
        $pagetitle = $this->title;
        $businesses = Business::get();
        return view('master.business.business_index',compact('pagetitle','businesses'));
    }

    public function businessAdd() : View
    {
        $pagetitle = $this->title;
        return view('master.business.business_add',compact('pagetitle'));
    }

    public function businessSubmit(SubmitBusinessRequest $request) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        // kirim parameter ip dan input
        $ipAddress = $request->ip();
        $input = "add";

        $defaultProperty = $this->defaultProperty($ipAddress, $input);
        
        $mergedData = array_merge($validatedRequest, $defaultProperty);

        try
        {
            $business = Business::create($mergedData);
        }catch(Exception $e)
        {
            return $e->getMessage();
        }
        
        return redirect()->route('businessIndex')->with('status', 'Business created.');
    }

    public function businessEdit($id) : View
    {
        $pagetitle = $this->title;
        $business = Business::findOrFail($id);
        
        $datauser= $this->get_user($business->m_createuser,$business->m_updateuser);
        return view('master.business.business_edit',compact('pagetitle','business', 'datauser'));
    }

    public function businessUpdate(UpdateBusinessRequest $request,$id) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        // kirim parameter ip dan input
        $ipAddress = $request->ip();
        $input = "edit";

        $defaultProperty = $this->defaultProperty($ipAddress, $input);
        
        $mergedData = array_merge($validatedRequest, $defaultProperty);

        try
        {
            $businessUpdated = Business::where('id_business',$id)->update($mergedData);
        }catch(Exception $e)
        {
            return $e->getMessage();
        }
        
        return redirect()->route('businessIndex')->with('status','Business updated.');
    }
}
