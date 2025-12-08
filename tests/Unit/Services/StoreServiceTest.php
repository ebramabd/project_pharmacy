<?php

namespace Tests\Unit\Services;

use App\Dtos\StoreDto;
use App\Services\Implementation\StoreService;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Stubs\StoreRepoStub;

class StoreServiceTest extends TestCase
{
   public function testCreateStore()
{
    $repoStub = new StoreRepoStub();

    $storeDto = new StoreDto();
    $storeDto->setBranchId(5);

    $obj = $this->createStoreServiceObj($repoStub);
    $obj->saveServ($storeDto);

    $stores = $repoStub->getAllStores();
    $this->assertCount(3, $stores);
}


    public function testGetOneStore()
    {
        $obj = $this->createStoreServiceObj();
        $store = $obj->getOneServ(['id'=>1]);
        $this->assertEquals(1, $store->prod_id);
    }

  private function createStoreServiceObj(StoreRepoStub $stub = null)
{
    $stub = $stub ?? new StoreRepoStub();
    return new StoreService($stub);
}
}
