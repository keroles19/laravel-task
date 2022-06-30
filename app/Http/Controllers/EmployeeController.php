<?php

namespace App\Http\Controllers;

use App\DataTables\CompanyDataTable;
use App\DataTables\EmployeeDataTable;
use App\Events\WelcomeEvent;
use App\Http\Requests\Comapny\CreateCompanyRequest;
use App\Http\Requests\Comapny\UpdateCompanyRequest;
use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Traits\ImageProcess;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    use ImageProcess;

    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render('employees.index');
    }


    public function create()
    {
        $company = $this->getCompany();
        return view('employees.create')->with([
            'company'=>$company
        ]);
    }


    public function store(CreateEmployeeRequest $request)
    {
        // upload image and get name it
        $logo = $this->saveImage($request->file_upload,'employee');
        // merge request by logo
        $request->merge(['image'=>$logo]);
        // create new record

        try{
            // create new employee
           $employee =  Employee::create($request->all());

            //send mail
            event(new WelcomeEvent($employee));
        }
        catch (\Exception $e){
            return back()->withErrors('exists error please try again');
        }

        return back()->with('success','Done :) created successful');

    }


    public function edit($id)
    {

        $model = $this->getEmployee($id);
        $company = $this->getCompany();

        return view('employees.edit')->with([
            'model'=>$model,
            'company'=>$company
        ]);
    }


    public function update(UpdateEmployeeRequest $request, $id)
    {


        $model = $this->getEmployee($id);
        // upload image and get name it
        if($request->has('file_upload')){
            $logo = $this->saveImage($request->file_upload,'employee',$model->image);
            // merge request by logo
            $request->merge(['image'=>$logo]);
        }
        // create new record
        $model->update($request->all());

        return back()->with('success','Done :) updated successful');
    }


    public function destroy($id)
    {
        $model = $this->getEmployee($id);
        $model->delete();
        return back()->with('success','Done :) deletes successful');
    }


    private function getCompany(){
        return Company::get(['id','name']);
    }

    private function getEmployee($id){
        return  Employee::findOrFail($id);
    }

}
