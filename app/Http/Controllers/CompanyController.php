<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comapny\CreateCompanyRequest;
use App\Http\Requests\Comapny\UpdateCompanyRequest;
use App\Models\Company;
use App\Traits\ImageProcess;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use ImageProcess;

    public function index()
    {
        return view('companies.index');
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

       $model = Company::findOrFail($id);
        return view('companies.edit')->with([
            'model'=>$model
        ]);
    }


    public function update(UpdateCompanyRequest $request, $id)
    {

        $model = Company::findORFail($id);
        // upload image and get name it
        if($request->has('file_upload')){
            $logo = $this->saveImage($request->file_upload,'company',$model->logo);
            // merge request by logo
            $request->merge(['logo'=>$logo]);
        }
        // create new record
        $model::query()->update([$request->only(['name','address','logo'])]);

        return back()->with('success','Done :) updated successful');
    }


    public function destroy($id)
    {
        //
    }


}
