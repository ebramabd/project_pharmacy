<?php

namespace App\Services\Implementation;

use App\Dtos\BranchDto;
use App\Models\Branch;
use App\Repositories\IBranchRepo;
use App\Services\IBranchService;
use Illuminate\Database\Eloquent\Collection;

class BranchService implements IBranchService
{
    public function __construct(private IBranchRepo $branchRepo)
    {
    }

    public function getAllBranches(): Collection
    {
        return $this->branchRepo->getAllBranches(); // get all branches from database
    }

    public function branchSave(BranchDto $dto, int $id = null): Branch
    {
        $data                = [];
        $data['branch_name'] = $dto->getBranchName() ;
        if ($id == null) {
            $branchName = [
                'branch_name' => $dto->getBranchName(),
            ] ;
            return $this->branchRepo->branchSave($dto, $id) ;
        }
        $branch = $this->branchRepo->branchSave($dto, $id) ;
        return $branch ;
    }

    public function getOneBranch(int $id = null): Branch
    {
        $getBranch = [
            'id' => $id,
        ] ;
        return $this->branchRepo->getOneBranch($getBranch) ;
    }

    public function branchDelete(int $id): void
    {
        $this->branchRepo->branchDelete($id);
    }
}
