<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\Repositories\Implementation\CategoryRepo;
use App\Services\ICategoryService;
use App\Services\Implementation\CategoryService;

class CategoryController
{

    public function __construct(private ICategoryService $categoryService)
    {
    }

    public function showAllCategory()
    {
        $categories = $this->categoryService->allCategoryPage();
        return view('admin.category.show' , compact('categories')) ;
    }

    public function save( CategoryRequest $request ,int $id = null)
    {
        $statue = '' ;
        $category = $this->categoryService->categorySave($request->getDto() , $id ) ;
        if ($category == false){
            return redirect()->route('branch.show')->with(['error' => 'this branch exist']);
        }
        if ($id != null){
            $statue = 'updated' ;
            return redirect()->route('category.show')->with(['success' => 'this category '. $statue.' successful']);
        }
        $statue = 'add' ;
        return redirect()->route('category.show')->with(['success' => 'this category '. $statue.' successful']);
    }

    public function deleted(int $id)
    {
        $this->categoryService->categoryDelete($id);
        return redirect()->route('category.show')->with(['success' => 'this category deleted successful']);
    }

    public function categorySavePage($id = null)
    {
        $dataWhere = ['id' => $id]  ;
        $categories = $this->categoryService->getOneCategory($dataWhere) ;
        return view('admin.category.create' , compact('categories')) ;
    }
}
