<?php

namespace App\Repositories;

use App\Dtos\BranchDto;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Collection;

interface IBranchRepo
{
    public function getAllBranches(): Collection;
    public function branchSave(BranchDto $dto ,int $id = null): Branch ;
    public function getOneBranch(array $data =[]): Branch ;
    public function branchDelete(int $id): void;
}
