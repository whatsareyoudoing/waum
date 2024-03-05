<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\ApplicationModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SubmitApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;

class ApplicationController extends Controller
{
    // inisialisasi title untuk setiap halaman
    private $title;
    public function __construct()
    {
        $this->title = "Application";
    }

    // tampilkan halaman view application
    public function applicationIndex() : View
    {
        $pagetitle = $this->title;

        // get seumua data yang ingin di tampilkan pada view
        $applications = ApplicationModel::all();

        return view('master.application.application-index', compact('applications', 'pagetitle'));
    }

    public function applicationAdd() : View
    {
        $pagetitle = $this->title;

        return view('master.application.application-add', compact('pagetitle'));
    }

    public function applicationSubmit(SubmitApplicationRequest $request)
    {
        $validatedRequest = $request->validated();

        // kirim parameter ip dan input
        $input = "add";

        $defaultProperty = $this->defaultProperty(strtolower($this->title), $input);

        $mergedData = array_merge($validatedRequest, $defaultProperty);

        try{
            $application = ApplicationModel::create($mergedData);
        }catch(Exception $error){
            return $error->getMessage();
        }

        return redirect()->route('applicationIndex')->with('status', 'Application created.');
    }

    public function applicationEdit($id) : View
    {
        $pagetitle = $this->title;
        $application = ApplicationModel::findOrFail($id);
        return view('master.application.application_edit',["application" => $application,"pagetitle"=>$pagetitle]);
    }

    public function applicationUpdate(UpdateApplicationRequest $request,$id) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        $ipAddress = $request->ip();
        $input = "edit";

        $defaultProperty = $this->defaultProperty(strtolower($this->title), $input);

        try{
            $applicationUpdated = ApplicationModel::where('id_application',$id)->update($validatedRequest);
        }catch(Exception $e){
            return $e->getMessage();
        }

        return redirect()->route('applicationIndex')->with('status','Application updated.');
    }
}
