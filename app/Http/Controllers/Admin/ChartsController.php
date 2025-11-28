<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\IChartsService;

class ChartsController extends Controller
{
    public function __construct(private IChartsService $chartsService)
    {
    }

    public function getChartBranch()
    {
        $data = $this->chartsService->getChartBranchService() ;
        return view('admin.charts.searchBranch', $data) ;
    }

    public function getChartProduct()
    {
        $data = $this->chartsService->getChartProductService() ;
        return view('admin.charts.search', $data) ;
    }
}
