<?php

namespace App\Services\Implementation;

use App\Dtos\BranchesOrdersReportsDto;
use App\Dtos\ProductNumReportsDto;
use App\Repositories\IReportsRepo;
use App\Services\IReportsService;
use Illuminate\Support\Collection;

class ReportsService implements IReportsService
{
    public function __construct(private IReportsRepo $reportsRepo)
    {
    }

    public function getAllBranchService(): Collection
    {
        return $this->reportsRepo->getAllBranchRepo() ;
    }

    public function BranchesOrdersReportsService(BranchesOrdersReportsDto $dto): Collection
    {
        $data = [];
        $data['branch'] = $dto->getBranchId();
        $data['period'] = $dto->getPeriod();
        return $this->reportsRepo->BranchesOrdersReportsRepo($data);
    }

    public function showOrderDetailsService(int $id): Collection
    {
        return $this->reportsRepo->showOrderDetailsRepo($id);
    }

    public function getNumProductService(ProductNumReportsDto $dto): string
    {
        $data = [];
        $data['branch'] = $dto->getBranch();
        $data['product'] = $dto->getProduct();
        $data['period'] = $dto->getPeriod();
        return $this->reportsRepo->getNumProductRepo($data);
    }

    public function showAllOrderOfBranchService():Collection
    {
        return $this->reportsRepo->showAllOrderOfBranchRepo();
    }


}



