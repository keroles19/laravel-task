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
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    use ImageProcess;

    public function index()
    {
        return view ('employees.index')->with([
            'model'=>$this->getCompany()
        ]);
    }


    public function employees(Request $request){

        if ($request->ajax()) {
            return DataTables::of(Employee::with('company'))
                ->addColumn('action', 'employees.action')
                ->filter(function ($instance) use ($request) {
                    if (isset($request->user)) {
                        $instance->where('company_id',$request->user);
                    }
                    if (!empty($request->search)) {
                        $instance->where(function($w) use($request){
                            $w->orWhere('name', 'LIKE', "%$request->search%")
                                ->orWhere('email', 'LIKE', "%$request->search%")
                            ->orWhereHas('company',function($query) use($request){
                                $query->where('name','LIKE',"%$request->search%");
                            })
                            ;
                        });
                    }
                })->rawColumns(['action'])
                ->make(true);
        }
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
