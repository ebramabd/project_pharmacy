<?php

namespace Tests\Unit\Services;

use App\Dtos\BranchRequestDto;
use App\Services\Implementation\BranchRequestService;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Stubs\BranchRequestStub;

class BranchRequestTest extends TestCase
{
    public function testGetDataForAccept()
    {
        $service = $this->createBranchRequestObj();
        $result = $service->getDataForAccept();

        $this->assertCount(1, $result);

        $item = $result->first();

        $this->assertEquals('not', $item->accept_or_not);
        $this->assertEquals(20, $item->quantity_of_prod);
    }

   public function testRequestUpdated()
{
    $service = $this->createBranchRequestObj();
    $before = $service->getDataForAccept()->first();
    $this->assertEquals('not', $before->accept_or_not);

    $dto = new BranchRequestDto();

    $service->acceptRequestBranch($dto);

    $after = $service->getDataForAccept()->first();
    $this->assertEquals('accepted', $after->accept_or_not);
}


    private function createBranchRequestObj()
    {
        return new BranchRequestService(new BranchRequestStub());
    }
}
