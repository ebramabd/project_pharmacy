<?php

namespace Tests\Unit\Services;

use App\Services\Implementation\ChartsService;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Stubs\ChartsRepoStub;

class ChartsServiceTest extends TestCase
{
    private ChartsService $chartsService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->chartsService = new ChartsService(
            new ChartsRepoStub()
        );
    }

    /** @test */
    public function it_returns_branch_chart_data(): void
    {
        $result = $this->chartsService->getChartBranchService();

        $this->assertIsArray($result);

        $this->assertArrayHasKey('branchNames', $result);
        $this->assertArrayHasKey('prices', $result);

        $this->assertCount(2, $result['branchNames']);
        $this->assertCount(2, $result['prices']);

        $this->assertEquals(
            ['branch1', 'branch2'],
            $result['branchNames']->toArray()
        );

        $this->assertEquals(
            [30, 30],
            $result['prices']->toArray()
        );
    }

    /** @test */
    public function it_returns_product_chart_data(): void
    {
        $result = $this->chartsService->getChartProductService();

        $this->assertIsArray($result);

        $this->assertArrayHasKey('productNames', $result);
        $this->assertArrayHasKey('productQuantities', $result);

        $this->assertCount(2, $result['productNames']);
        $this->assertCount(2, $result['productQuantities']);

        $this->assertEquals(
            ['product1', 'product2'],
            $result['productNames']->toArray()
        );

        $this->assertEquals(
            [50, 20],
            $result['productQuantities']->toArray()
        );
    }
}
