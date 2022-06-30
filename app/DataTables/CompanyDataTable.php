<?php

namespace App\DataTables;

use App\Models\Company;
use Yajra\DataTables\Services\DataTable;

class CompanyDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'companies.action')
            ->rawColumns([
                'action'
            ]);

    }


    public function query(Company $model)
    {
        return $model->newQuery();
    }


    public function html()
    {
        return $this->builder()
                    ->setTableId('company-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
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
                'name' => 'address',
                'data' => 'address',
                'title' => 'Address',
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
        return 'Company_' . date('YmdHis');
    }
}
