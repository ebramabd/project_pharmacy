<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BranchesOrdersReportsRequest;
use App\Http\Requests\Admin\ProductNumReportsRequest;
use App\Services\IBranchService;
use App\Services\IProductService;
use App\Services\IReportsService;

class ReportsController extends Controller
{
    public function __construct(
        private IReportsService $reportsService,
        private IProductService $productService,
        private IBranchService $branchService
    ) {
    }

    public function showView()
    {
        $branches = $this->reportsService->getAllBranchService();
        return view('admin.reports.searchBranches', compact('branches')) ;
    }

    public function search(BranchesOrdersReportsRequest $request)
    {
        $orders = $this->reportsService->BranchesOrdersReportsService($request->getDto()) ;
        return view('admin.reports.branchesOrdersReports', compact('orders')) ;
    }

    public function showOrderDetails(int $id)
    {
        $orderDetails = $this->reportsService->showOrderDetailsService($id);
        return view('admin.reports.showOrderDetails', compact('orderDetails'));
    }

    public function searchProductNum()
    {
        $data             = [] ;
        $data['branches'] = $this->branchService->ShowAllServ() ;
        $data['products'] = $this->productService->ShowAllServ() ;
        return view('admin.reports.product.searchProductNum', $data);
    }

    public function getProductNum(ProductNumReportsRequest $request)
    {
        $product = $this->reportsService->getNumProductService($request->getDto()) ;
        return redirect()->route('search-product')->with(['success' => 'this all product '.$product.' successful']);
    }
    public function showAllOrderOfBranch()
    {
        $branchOrders = $this->reportsService->showAllOrderOfBranchService();
        return view('admin.reports.showAllBranchOrders', compact('branchOrders'));
    }

}
