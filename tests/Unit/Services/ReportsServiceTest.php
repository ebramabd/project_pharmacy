<?php

namespace Tests\Unit\Services;

use App\Dtos\BranchesOrdersReportsDto;
use App\Dtos\ProductNumReportsDto;
use App\Services\Implementation\ReportsService;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Stubs\ReportsRepoStub;

class ReportsServiceTest extends TestCase
{
    public function testGetAllBranchService()
    {
        $branches = $this->createReportServiceObject()->getAllBranchService();
        $this->assertCount(2, $branches);
    }

    public function testBranchesOrdersReportsService()
    {
        $dto = new BranchesOrdersReportsDto;
        $dto->setBranchId(1);
        $dto->setPeriod(5);

        $obj = $this->createReportServiceObject();
        $report = $obj->BranchesOrdersReportsService($dto);
        $this->assertCount(1, $report);
    }

    public function testShowOrderDetailsService()
    {
        $obj = $this->createReportServiceObject();
        $report = $obj->showOrderDetailsService(1);
        $this->assertCount(2, $report);
    }

    public function testGetNumProductService()
    {
        $dto = new ProductNumReportsDto();
        $dto->setBranch(1);
        $dto->setProduct(1);
        $dto->setPeriod(5);

        $service = $this->createReportServiceObject();
        $result = $service->getNumProductService($dto);
        $this->assertEquals("50", $result);
    }

    public function testShowAllOrderOfBranchService()
    {
        $service = $this->createReportServiceObject();
        $report = $service->showAllOrderOfBranchService();
        $this->assertCount(2, $report);

        $firstOrder = $report->first();
        $this->assertEquals(1, $firstOrder->id);
        $this->assertEquals(30, $firstOrder->price);
        $this->assertEquals('branch1', $firstOrder->branch_name);

        $secondOrder = $report[1];
        $this->assertEquals(2, $secondOrder->id);
        $this->assertEquals(30, $secondOrder->price);
        $this->assertEquals('branch2', $secondOrder->branch_name);
    }

    private function createReportServiceObject(): ReportsService
    {
        return new ReportsService(new ReportsRepoStub());
    }
}
