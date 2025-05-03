<?php

namespace App\Services;

use App\Dtos\BranchesOrdersReportsDto;
use App\Dtos\ProductNumReportsDto;
use Illuminate\Support\Collection;

interface IReportsService
{
    public function getAllBranchService(): Collection;
    public function BranchesOrdersReportsService(BranchesOrdersReportsDto $dto): Collection;
    public function showOrderDetailsService(int $id): Collection;
    public function getNumProductService(ProductNumReportsDto $dto): string;
    public function showAllOrderOfBranchService():Collection;

}

