<?php

namespace Tests\Unit\Services;

use App\Dtos\OrderDto;
use App\Services\Implementation\OrderService;
use Tests\TestCase;
use Tests\Unit\Stubs\OrderRepoStubTest;
use Illuminate\Support\Collection;

class OrderServiceTest extends TestCase
{

    private OrderService $orderService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->orderService = new OrderService(
            new OrderRepoStubTest()
        );
    }

    public function testGetDataToShowService()
    {
        $result = $this->orderService->getDataToShowService();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertNotEmpty($result);

        $item = $result->first();

        $this->assertObjectHasProperty('id', $item);
        $this->assertObjectHasProperty('prod_id', $item);
        $this->assertObjectHasProperty('branch_id', $item);
        $this->assertEquals(1, $item->branch_id);
    }

    public function testStoreServiceSuccessfully(): void
    {
        $dto = (new OrderDto())
            ->setOptions([1])
            ->setQuantity([2]);

        $result = $this->orderService->storeService($dto);

        $this->assertIsString($result);
        $this->assertEquals('تمام يا ريس تعبناك معانا ', $result);
    }



}
