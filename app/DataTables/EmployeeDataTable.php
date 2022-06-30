<?php

namespace App\DataTables;

use App\Models\Employee;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmployeeDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'employees.action')
            ->addColumn('company', function (Employee $model) {
                return $model->company->name;
            })
            ->rawColumns([
                'action'
            ]);

    }



    public function query(Employee $model)
    {
        return $model->newQuery()->with('company');
    }


    public function html()
    {
        return $this->builder()
            ->setTableId('company-table')
            ->columns($this->getColumns())
            ->minifiedAjax(



            )
            ->orderBy(1)
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [[10, 25, 100, -1], [10, 25, 100, 'All record']],
            ]);
    }


    protected function getColumns()
    {
        return [
            [
                'name' => 'id',
                'data' => 'id',
                'title' => 'id',
            ],
            [
                'name' => 'name',
                'data' => 'name',
                'title' => 'name',
            ],
            [
                'name' => 'email',
                'data' => 'email',
                'title' => 'email',
            ],

            [
                'name' => 'company.name',
                'data' => 'company',
                'title' => 'Company',
            ],
            [
                'name' => 'action',
                'data' => 'action',
                'title' => 'action',
                'searchable' => false,
                'orderable' => false,
                'exportable' => false
            ],
        ];
    }



    protected function filename()
    {
        return 'Employee_' . date('YmdHis');
    }
}
