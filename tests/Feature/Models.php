<?php

namespace Tests\Feature;

use App\Dtos\BranchDto;
use App\Models\Admin;
use App\Models\Branch;
use Illuminate\Support\Collection;

trait Models
{

    /**
     * @return \App\Models\Admin
     *
     */
    public function getAdmin(): Admin
    {
        return Admin::where('user_name', 'ebram')->first();
    }

    /**
     * Notes:
     * - Uses `insert()` for performance (no Eloquent events fired).
     * - Timestamps are not automatically handled.
     * - Intended mainly for testing or seeding purposes.
     *
     * @return void
     */
    public function storeBranch(): void
    {
        $dtoObj = new BranchDto();
        $dtoObj->setBranchName('branch1');

        $dtoObj2 = new BranchDto();
        $dtoObj2->setBranchName('branch2');

        Branch::insert([
            ['branch_name' => $dtoObj->getBranchName()],
            ['branch_name' => $dtoObj2->getBranchName()],
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection<int, \App\Models\Branch>
     */
    public function getBranches(): Collection
    {
        return Branch::all();
    }


}
