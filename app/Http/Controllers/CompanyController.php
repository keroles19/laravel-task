<?php

namespace App\Http\Controllers;

use App\DataTables\CompanyDataTable;
use App\Http\Requests\Comapny\CreateCompanyRequest;
use App\Http\Requests\Comapny\UpdateCompanyRequest;
use App\Models\Company;
use App\Traits\ImageProcess;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use ImageProcess;

    public function index(CompanyDataTable $dataTable)
    {
        return $dataTable->render('companies.index');
    }


    public function create()
    {
        return view('companies.create');
    }


    public function store(CreateCompanyRequest $request)
    {
        // upload image and get name it
        $logo = $this->saveImage($request->file_upload,'company');
        // merge request by logo
        $request->merge(['logo'=>$logo]);
        // create new record
        Company::create($request->all());

        return back()->with('success','Done :) created successful');

    }


    public function edit($id)
    {

       $model = $this->getCompany($id);
        return view('companies.edit')->with([
            'model'=>$model
        ]);
    }


    public function update(UpdateCompanyRequest $request, $id)
    {

        $model = $this->getCompany($id);
        // upload image and get name it
        if($request->has('file_upload')){
            $logo = $this->saveImage($request->file_upload,'company',$model->logo);
            // merge request by logo
            $request->merge(['logo'=>$logo]);
        }
        // create new record
        $model->update($request->all());

        return back()->with('success','Done :) updated successful');
    }


    public function destroy($id)
    {
        $model = $this->getCompany($id);
        $model->delete();
        return back()->with('success','Done :) deletes successful');
    }

    private function getCompany($id){
        return Company::findOrFail($id);
    }

}
