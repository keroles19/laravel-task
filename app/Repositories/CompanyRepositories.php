<?php

namespace App\Repositories;

use App\Interfaces\CompanyInterface;

class CompanyRepositories implements CompanyInterface
{
    protected $model;
    public function __construct($model)
    {
        $this->model = $model;
    }



    public function showAll($datatable, $view)
    {

    }


    public function createCompany($view)
    {
      return view($view);
    }

    public function storeCompany($request)
    {

    }

    public function editCompany($id, $view)
    {

    }

    public function updateCompany($id, $request)
    {

    }

    public function deleteCompany($id, $view)
    {

    }

}
