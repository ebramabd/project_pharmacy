<?php

namespace App\Services;

use App\Dtos\OrderDto;
use Illuminate\Support\Collection;

interface IOrderService
{
    public function getDataToShowService(): Collection;
    public function storeService(OrderDto $dto): string;
}
