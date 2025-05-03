<?php

namespace App\Repositories;

interface IChartsRepo
{
    public function getChartBranchRepo(): array;

    public function getChartProductRepo(): array;
}
