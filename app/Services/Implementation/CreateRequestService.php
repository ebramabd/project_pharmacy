<?php

namespace App\Services\Implementation;

use App\Dtos\AddRequestBranchDto;
use App\Dtos\EditProductDetailsDto;
use App\Repositories\ICreateRequestRepo;
use App\Services\ICreateRequestService;
use Illuminate\Support\Collection;

class CreateRequestService implements ICreateRequestService
{
    public function __construct(private ICreateRequestRepo $createRequestRepo)
    {
    }

    public function addRequestSer(AddRequestBranchDto $dto): void
    {
        $data                     = [];
        $data['branch_id']        = $dto->getBranchId() ;
        $data['prod_id']          = $dto->getProdId() ;
        $data['quantity_of_prod'] = $dto->getQuantityOfProd() ;
        $this->createRequestRepo->addRequestRepo($data);
    }

    public function updateStoreSer(EditProductDetailsDto $dto): void
    {
        $data                 = [];
        $data['max_quantity'] = $dto->getMaxQuantity();
        $data['min_quantity'] = $dto->getMinQuantity();
        $data['price']        = $dto->getPrice();
        $data['prod_id']      = $dto->getProdId();
        $this->createRequestRepo->updateStoreRepo($data) ;
    }

    public function getProductFromBranchService(): Collection
    {
        return $this->createRequestRepo->getProductFromBranchRepo();
    }

}
