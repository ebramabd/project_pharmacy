<?php

namespace App\Services;

use App\Dtos\AddRequestBranchDto;
use App\Dtos\EditProductDetailsDto;
use Illuminate\Support\Collection;

interface ICreateRequestService
{
    public function addRequestSer(AddRequestBranchDto $dto): void;
    public function updateStoreSer(EditProductDetailsDto $dto): void;
    public function getProductFromBranchService(): Collection;
}
