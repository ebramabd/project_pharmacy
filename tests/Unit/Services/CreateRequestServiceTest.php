<?php

namespace Tests\Unit\Services;

use App\Dtos\AddRequestBranchDto;
use App\Dtos\EditProductDetailsDto;
use App\Services\Implementation\CreateRequestService;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Stubs\CreateRequestRepoStub;

class CreateRequestServiceTest extends TestCase
{
    private CreateRequestService $service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = new CreateRequestService(
            new CreateRequestRepoStub()
        );
    }

    public function testItAddsRequestSuccessfully(): void
    {
        $dto = (new AddRequestBranchDto())
            ->setBranchId(1)
            ->setProdId(1)
            ->setQuantityOfProd(10);

        $this->service->addRequestSer($dto);

        $this->assertTrue(true);
    }

    public function testItUpdatesStoreSuccessfully(): void
    {
        $dto = (new EditProductDetailsDto())
            ->setProdId(1)
            ->setMaxQuantity(50)
            ->setMinQuantity(25)
            ->setPrice(22.5);

        $this->service->updateStoreSer($dto);

        $products = $this->service->getProductFromBranchService();
        $product  = $products->first();

        $this->assertEquals(50, $product->max_quantity);
        $this->assertEquals(25, $product->min_quantity);
        $this->assertEquals(22.5, $product->price);
    }


    public function testItReturnsProductsFromBranch(): void
    {
        $result = $this->service->getProductFromBranchService();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertNotEmpty($result);

        $item = $result->first();

        $this->assertObjectHasProperty('prod_id', $item);
        $this->assertObjectHasProperty('branch_id', $item);
        $this->assertObjectHasProperty('max_quantity', $item);
        $this->assertObjectHasProperty('min_quantity', $item);
        $this->assertObjectHasProperty('quantity_item', $item);
        $this->assertObjectHasProperty('price', $item);

        $this->assertEquals(1, $item->branch_id);
    }
}
