<?php

namespace App\Services\Implementation;

use App\Dtos\OrderDto;
use App\Repositories\Implementation\OrderRepo;
use App\Repositories\IOrderRepo;
use App\Services\IOrderService;
use Illuminate\Support\Collection;

class OrderService implements IOrderService
{
    public function __construct(private IOrderRepo $orderRepo)
    {
    }

    public function getDataToShowService(): Collection
    {
        return $this->orderRepo->getDataToShowRepo();
    }

    public function storeService(OrderDto $dto): string
    {
        $products =  $dto->getOptions() ;
        $quantities =  $dto->getQuantity();

        $dataOrder = array_map(function($product, $quantity) {
            return ["product_id" => $product, "quantity" => $quantity];
        }, $products, $quantities);

        return $this->orderRepo->storeRepo($dataOrder) ;
    }
}
