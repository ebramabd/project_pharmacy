<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\BranchRequestRequest;
use App\Services\IBranchRequestService;


class BranchRequestController
{
    public function __construct(private IBranchRequestService $branchRequestService)
    {
    }

    public function allRequestPage()
    {
        $dataOfRequest = $this->branchRequestService->getDataForAccept();
        return view('admin.requests.show' , compact('dataOfRequest'));
    }

    public function acceptRequestBranch(BranchRequestRequest $request)
    {
         $this->branchRequestService->acceptRequestBranch($request->getDto()) ;
    }
}
