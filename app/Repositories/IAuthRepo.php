<?php

namespace App\Repositories;

interface IAuthRepo
{
    public function getAllRepo();
    public function saveRepo($data, $id = null) ;
    public function deleteRepo($id);
    public function get_name_product_branch_repo() ;

}
