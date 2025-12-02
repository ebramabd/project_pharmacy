<?php

namespace Tests\Unit\Services;

use App\Dtos\BranchDto;
use App\Services\Implementation\BranchService;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Stubs\BranchRepoStub;

class BranchServiceTest extends TestCase
{
    public function testGetAllBranches()
    {
        $obj = $this->createBranchServiceObj();
        $branches = $obj->getAllBranches();
        $this->assertCount(2, $branches);
    }

    public function testGetOneBranch()
    {
        $obj = $this->createBranchServiceObj();
        $branch = $obj->getOneBranch(1);
        $this->assertEquals('branch1', $branch->branch_name);
    }

    public function testCreateBranch()
    {
        $branchDto = new BranchDto();
        $branchDto->setBranchId(3);
        $branchDto->setBranchName('branch3');

        $obj = $this->createBranchServiceObj();
        $obj->branchSave($branchDto);

        $branches = $obj->getAllBranches();
        $this->assertCount(3, $branches);

        $branchNames = [];
        foreach ($branches as $branch) {
            $branchNames[] = $branch->branch_name;
        }
        $this->assertContains('branch3', $branchNames);
    }

    public function testUpdateBranch()
    {
        $branchDto = new BranchDto();
        $branchDto->setBranchId(1);
        $branchDto->setBranchName('branchUpdate');

        $obj = $this->createBranchServiceObj();
        $obj->branchSave($branchDto, $branchDto->getBranchId());

        $branches = $obj->getAllBranches();
        $this->assertCount(2, $branches);

        $branchNames = [];
        foreach ($branches as $branch) {
            $branchNames[] = $branch->branch_name;
        }
        $this->assertContains($branchDto->getBranchName(), $branchNames);
    }

    public function testDeleteBranch()
    {
        $obj = $this->createBranchServiceObj();
        $obj->branchDelete(1);

        $branches = $obj->getAllBranches();
        $this->assertCount(1, $branches);
    }

    private function createBranchServiceObj(): BranchService
    {
        return new BranchService(new BranchRepoStub());
    }
}
