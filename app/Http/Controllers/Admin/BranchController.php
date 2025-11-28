<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\BranchRequest;
use App\Services\IBranchService;

class BranchController
{
    public function __construct(private IBranchService $branchServ)
    {
    }

    public function branchSavePage(int $id = null)
    {
        $branches = $this->branchServ->getOneBranch($id) ;
        return view('admin.branch.create', compact('branches')) ;
    }

    public function save(BranchRequest $request, int $id = null)
    {
        $statue = '' ;
        $branch = $this->branchServ->branchSave($request->getDto(), $id) ;
        if (empty($branch)) {
            return redirect()->route('branch.show')->with(['error' => 'this branch exist']);
        }
        if ($id != null) {
            $statue .= 'update' ;
            return redirect()->route('branch.show')->with(['success' => 'this branch '.$statue.' successful']);
        }
        $statue .= 'added' ;
        return redirect()->route('branch.show')->with(['success' => 'this branch '.$statue.' successful']);
    }

    public function AllBranchesPage()
    {
        $branches = $this->branchServ->getAllBranches();
        return view('admin.branch.show', compact('branches')) ;
    }

    public function deleted(int $id)
    {
        $branch = $this->branchServ->branchDelete($id);
        if ($branch == false) {
            return redirect()->route('branch.show')->with(['error' => 'this category deleted successful']);
        }
        return redirect()->route('branch.show')->with(['success' => 'this category deleted successful']);
    }

}
