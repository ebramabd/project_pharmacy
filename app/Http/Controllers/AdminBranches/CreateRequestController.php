<?php

namespace App\Http\Controllers\AdminBranches;

use App\Http\Requests\AdminBranches\AddRequestBranchRequest;
use App\Http\Requests\AdminBranches\EditProductDetailsRequest;
use App\Services\ICategoryService;
use App\Services\ICreateRequestService;

class CreateRequestController
{
    public function __construct(private ICategoryService $categoriesService, private ICreateRequestService $createRequestService)
    {
    }

    public function getCategories()
    {
        $categories = $this->categoriesService->allCategoryPage();
        return view('adminBranches.showAllCategories', compact('categories'));
    }

    public function getProducts($cat_id)
    {
        $products = $this->categoriesService->getProductNameFromTableCategoryOfProductService($cat_id) ;
        return view('adminBranches.showProducts', compact('products'));
    }

    public function getProductsWithBranch()
    {
        $productsDetails = $this->createRequestService->getProductFromBranchService() ;
        return view('adminBranches.showOneProductDetails', compact('productsDetails'));
    }

    public function getDetailsProducts($prod_id)
    {
        $branch_id       = auth()->user()->branch_id ;
        $productsDetails = $this->categoriesService->getDetailsProductFromTableStoreService($branch_id, $prod_id) ;
        return view('adminBranches.showOneProductDetails', compact('productsDetails')) ;
    }

    public function addRequest(AddRequestBranchRequest $request)
    {
        $this->createRequestService->addRequestSer($request->getDto());
    }

    public function updateStore(EditProductDetailsRequest $request)
    {
        $this->createRequestService->updateStoreSer($request->getDto());
    }

}
