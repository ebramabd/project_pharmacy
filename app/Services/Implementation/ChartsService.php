<?php

namespace App\Services\Implementation;

use App\Repositories\IChartsRepo;
use App\Services\IChartsService;

class ChartsService implements IChartsService
{
    public function __construct(private IChartsRepo $chartsRepo)
    {
    }

    public function getChartBranchService(): array
    {
        return $this->chartsRepo->getChartBranchRepo();
    }

    public function getChartProductService(): array
    {
        return $this->chartsRepo->getChartProductRepo() ;
    }
}
