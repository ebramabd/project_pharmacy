<?php

namespace App\Services;

interface IChartsService
{
    public function getChartBranchService(): array;
    public function getChartProductService(): array;
}
