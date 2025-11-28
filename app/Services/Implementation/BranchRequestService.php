<?php

namespace App\Services\Implementation;

use App\Dtos\BranchRequestDto;
use App\Repositories\IBranchRequestRepo;
use App\Services\IBranchRequestService;
use Illuminate\Support\Collection;

class BranchRequestService implements IBranchRequestService
{
    public function __construct(private IBranchRequestRepo $requestBranchRepo)
    {
    }

    public function getDataForAccept(): Collection
    {
        return $this->requestBranchRepo->getDataForAccept();
    }

    public function acceptRequestBranch(BranchRequestDto $dto): void
    {
        $this->requestBranchRepo->acceptRequestBranch($dto) ;
    }

}
