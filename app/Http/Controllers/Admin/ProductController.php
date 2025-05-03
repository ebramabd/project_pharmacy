<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\ProductRequest;
use App\Services\ICategoryService;
use App\Services\Implementation\CategoryService;
use App\Services\Implementation\ProductService;
use App\Services\IProductService;
use Illuminate\Http\Request;

class ProductController
{

    public function __construct(private IProductService $productService ,private ICategoryService $categoryService)
    {
    }


    public function showProductView()
    {
        $data = $this->productService->getShowAllData();
        return view('admin.product.show', $data);
    }

    public function getViewProduct($id = null)
    {
        $data = [];
        $data['categories'] = $this->categoryService->ShowAllServ();
        $dataWhere = ['id' => $id] ;
        $data['products'] = $this->productService->getOneSer($dataWhere) ;
        return view('admin.product.create' , $data) ;
    }

    public function saveProduct( ProductRequest $request , $id = null)
    {
        $statue = '' ;
        $products = $this->productService->saveServ($request->getDto(), $id) ;
        if ($id != null){
            $statue .= 'update' ;
            return redirect()->route('product.show')->with(['error' => 'this branch '.$statue.' successful']);
        }

        $statue .= 'added' ;
        return redirect()->route('product.show')->with(['success' => 'this branch '.$statue.' successful']);
    }

    public function delete($id)
    {
        $product = $this->productService->deleteServ($id);
        if ($product == false){
            return redirect()->route('product.show')->with(['error' => 'this category deleted successful']);
        }
        else
        return redirect()->route('product.show')->with(['success' => 'this category deleted successful']);

    }
}
