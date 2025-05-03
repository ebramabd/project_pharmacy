<?php

namespace App\Services\Implementation;

use App\Dtos\StoreDto;
use App\Models\Store;
use App\Repositories\IStoreRepo;
use App\Services\IStoreService;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class StoreService implements  IStoreService
{

    public function __construct(private IStoreRepo $storeRepo)
    {
    }


//    public function ShowAllServ()
//    {
//        return $this->crudUserRepo->getAllRepo();
//    }

    public function saveServ(StoreDto $dto , $id = null): void
    {
        $data['branch_id'] =  $dto->getBranchId() ;

        $dataWhere = ['branch_id' => $dto->getBranchId() ] ;
        $branchExist = $this->storeRepo->getOneRepo($dataWhere);
        if (!empty($branchExist)){
            throw ValidationException::withMessages([
                'username' => 'not found user name'
            ]);
        }
        $this->storeRepo->saveRepo($data) ;
    }


    public function getOneServ(int $id):Store
    {
        return $this->storeRepo->getOneRepo($id) ;
    }


    public function getNameProductBranchService():Collection
    {
        return $this->storeRepo->getNameProductBranchRepo();
    }


}
