<?php

namespace App\Repositories;

use App\Dtos\BranchDto;
use App\Models\Branch;
use Illuminate\Support\Collection;

interface IBranchRepo
{
    /**
     * @return \Illuminate\Support\Collection
    */
    public function getAllBranches(): Collection;

    /**
     * Create or update a category.
     *
     * If $id is provided, the branch will be updated.
     * If $id is null, a new branch will be created.
     *
     * @param array{
     *     branch_name: string
     * } $data  The branch data. Requires 'branch_name'.
     *
     * @param int|null $id  The branch ID (optional).
     *
     * @return \App\Models\Branch
     */
    public function branchSave(array $data = [], int $id = null): Branch;

    /**
     * @param array{
     *     "id":"value"
     *} $data this data not static
     *
     * @return \App\Models\Branch
     */
    public function getOneBranch(array $data = []): Branch;

    /**
     * @param int $id
     */
    public function branchDelete(int $id): void;
}
