<?php

namespace Tests\Unit\Stubs;

use App\Models\Branch;
use App\Repositories\IBranchRepo;
use Illuminate\Support\Collection;


class BranchRepoStub implements IBranchRepo
{
    private Collection $branchesCollection;

    public function __construct()
    {
        $this->branchesCollection = collect([
            (object)[
                'id' => 1,
                'branch_name' => 'branch1'
            ],
            (object)[
                'id' => 2,
                'branch_name' => 'branch2'
            ]
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection<int , Branch>
     */
    public function getAllBranches(): Collection
    {
        return $this->branchesCollection;
    }

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
    public function branchSave(array $data = [], int $id = null): Branch
    {
        if ($id) {
            $item = $this->branchesCollection->firstWhere('id', $id);

            if ($item) {
                $item->branch_name = $data['branch_name'];
            }

            return new Branch([
                'id' => $id,
                'branch_name' => $data['branch_name'],
            ]);
        }

        $newId = $this->branchesCollection->max('id') + 1;
        $newBranch = (object)[
            'id' => $newId,
            'branch_name' => $data['branch_name'],
        ];
        $this->branchesCollection->push($newBranch);
        return new Branch([
            'id' => $newId,
            'branch_name' => $data['branch_name'],
        ]);
    }

    /**
     * @param array{
     *     "id":"value"
     *} $data this data not static
     *
     * @return \App\Models\Branch
     */
    public function getOneBranch(array $data = []): Branch
    {
        $item = $this->branchesCollection->firstWhere('id', 1);
        return new Branch([
            'id' => $item->id,
            'branch_name' => $item->branch_name,
        ]);
    }

    /**
     * @param int $id
     */
    public function branchDelete(int $id): void
    {
        $this->branchesCollection = $this->branchesCollection->reject(fn($item) => $item->id === $id)->values();
    }
}
