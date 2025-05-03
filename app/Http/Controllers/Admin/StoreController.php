<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Services\IBranchService;
use App\Services\Implementation\BranchService;
use App\Services\Implementation\StoreService;
use App\Services\Implementation\UserService;
use App\Services\IStoreService;
use App\Services\IUserService;

class StoreController extends Controller
{

    public function __construct(
        private IStoreService $storeService ,
        private IBranchService $branchService ,
        )
    {
    }


    public function showView()
    {
        $stores = $this->storeService->getNameProductBranchService();
        return view('admin.store.show' ,compact('stores') ) ;
    }

    public function getViewSave($id = null)
    {
        $branches = $this->branchService->getAllBranches();
        return view('admin.store.create' , compact('branches')) ;
    }

    public function save(StoreRequest $request , $id = null)
    {

        $statue = '' ;
        $store  = $this->storeService->saveServ($request->getDto() , $id ) ;
        if ($store == false ){
            return redirect()->route('store.show')->with(['error' => 'this branch is here']);
        }
        $statue .= 'add' ;
        return redirect()->route('store.show')->with(['success' => 'this user '.$statue.' successful']);
    }



}
