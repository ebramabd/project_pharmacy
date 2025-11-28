<?php

namespace App\Repositories;

use App\Dtos\BranchRequestDto;
use Illuminate\Support\Collection;

interface IBranchRequestRepo
{
    public function getDataForAccept(): Collection;

    public function acceptRequestBranch(BranchRequestDto $dto): void;

    public function changeQuantityOfProduct(int $prod_id, int $branch_id, int $quantity_of_prod): void;
}
