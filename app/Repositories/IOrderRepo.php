<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Support\Collection;

interface IOrderRepo
{
    public function getDataToShowRepo(): Collection;
    public function storeRepo(array $data): string;
    public function storeOrder(int $admin_id ,string $price ,int $branch_id):Order;
}
