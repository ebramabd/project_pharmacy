<?php

namespace App\Http\Controllers\AdminBranches;

use App\Services\Implementation\CreateRequestService;
use App\Services\Implementation\CategoryService;
use Illuminate\Http\Request;

class Admin_branch
{
    public function __construct(
        private CategoryService $crudCategoriesServ,
        private CreateRequestService $adminBranchSer
    ) {
    }

    public function afterLogin()
    {
        if (auth()->user()->type == 'admin_branch'){
            return view('layouts.admin');
        }
        elseif (auth()->user()->type == 'admin_panel'){
            return view('layouts.admin');
        }
        return auth()->user()->user_name;
    }
}
