<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\Business;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->title = "Company";
    }

    public function companyIndex() : View
    {
        $pagetitle = $this->title;
        $companys = Company::with('businesses')->get();
        return view('transaksi.company.company_index', compact('companys', 'pagetitle'));
    }

    public function companyAdd() : View
    {
        $bussines=Business::get();
        $pagetitle = $this->title;
        return view('transaksi.company.company_add',compact('bussines','pagetitle'));
    }

    public function companySubmit(SubmitCompanyRequest $request) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        // kirim parameter ip dan input
        $ipAddress = $request->ip();
        $input = "add";

        $defaultProperty = $this->defaultProperty($ipAddress, $input);

        $mergedData = array_merge($validatedRequest, $defaultProperty);

        try
        {
            $company = Company::create($mergedData);

        }catch(Exception $e)
        {
            return $e->getMessage();
        }

        return redirect()->route('companyIndex')->with('status', 'Company created.');
    }

    public function companyEdit($id) : View
    {
        $pagetitle = $this->title;
        $company = Company::findOrFail($id);
        $bussines=Business::get();
        return view('transaksi.company.company_edit',compact('company','bussines','pagetitle'));
    }

    public function companyUpdate(UpdateCompanyRequest $request,$id) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        // kirim parameter ip dan input
        $ipAddress = $request->ip();
        $input = "edit";

        $defaultProperty = $this->defaultProperty($ipAddress, $input);

        $mergedData = array_merge($validatedRequest, $defaultProperty);

        try
        {
            $companyUpdated = Company::where('id_company',$id)->update($mergedData);
        }catch(Exception $e)
        {
            return $e->getMessage();
        }

        return redirect()->route('companyIndex')->with('status','Company updated.');
    }
}
