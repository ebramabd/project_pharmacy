<?php

namespace App\Services;

use App\Dtos\BranchDto;
use App\Models\Branch;
use Illuminate\Support\Collection;

interface IBranchService
{
    public function getAllBranches(): Collection;
    public function branchSave(BranchDto $dto, int $id = null): Branch ;
    public function getOneBranch(int $id = null): Branch;
    public function branchDelete(int $id): void;

}
