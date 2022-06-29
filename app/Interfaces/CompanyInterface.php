<?php

namespace App\Interfaces;

interface CompanyInterface
{
    public function showAll($datatable,$view);

    public function createCompany($view);

    public function storeCompany($request);

    public function editCompany($id,$view);

    public function updateCompany($id,$request);

    public function deleteCompany($id,$view);

}
