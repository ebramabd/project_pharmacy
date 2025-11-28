<?php

namespace App\Services;

use App\Dtos\BranchRequestDto;
use Illuminate\Support\Collection;

interface IBranchRequestService
{
    public function getDataForAccept(): Collection;
    public function acceptRequestBranch(BranchRequestDto $dto): void;
}
