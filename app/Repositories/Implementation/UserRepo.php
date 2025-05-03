<?php

namespace App\Repositories\Implementation;

use App\Models\Admin;
use App\Repositories\IUserRepo;
use App\Trait\Crud;
use Illuminate\Support\Facades\DB;

class UserRepo implements IUserRepo
{
    use Crud ;

//    public function getAllRepo()
//    {
//        return $this->getAllObject(new Admin());
//    }
    public function getOneRepo(int $id = null) :Admin
    {
        if (is_null($id)) {
            return new Admin();
        }
        $dataWhere = ['id' => $id] ;
        return $this->getOneObject(new Admin() , $dataWhere) ;
    }

    public function saveRepo(array $data, int $id = null ) :Admin
    {
        return $this->save(new Admin(), $data,  $id);
    }

    public function deleteRepo(int $id): void
    {
         $this->delete(new Admin() , $id) ;
    }

    public function getBranchNameRepo() : array
    {
        return DB::table('branches')
            ->join('users' , 'branches.id' , '=' , 'users.branch_id')
            ->get()->toArray() ;
    }



}
