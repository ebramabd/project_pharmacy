<?php

namespace App\Services;

use App\Dtos\ProductDto;
use App\Models\Product;
use Illuminate\Support\Collection;


interface IProductService
{
    public function ShowAllServ(): Collection ;
    public function getShowAllData(): array;
    public function saveServ(ProductDto $dto, int $id = null): Product;
    public function deleteServ(int $id): void;
    public function getOneSer(array $data = []): Product ;
}
