<?php

namespace App\Repositories\Implementation;

use App\Dtos\BranchDto;
use App\Models\Branch;
use App\Repositories\IBranchRepo;
use App\Trait\Crud;
use Illuminate\Database\Eloquent\Collection;

class BranchRepo implements IBranchRepo
{
    use Crud ;

    public function getAllBranches(): Collection
    {
        return $this->getAllObject(new Branch());
    }

    public function branchSave(BranchDto $dto, int $id = null): Branch
    {
        $data = [
            'branch_name' => $dto->getBranchName(),
        ];
        return $this->save(new Branch(), $data, $id);
    }

    public function getOneBranch(array $data = []): Branch
    {
        $branch = $this->getOneObject(new Branch(), $data) ;
        if ($branch == false) {
            return new Branch();
        }return $branch ;
    }

    public function branchDelete($id): void
    {
        $this->delete(new Branch(), $id) ;
    }
}
