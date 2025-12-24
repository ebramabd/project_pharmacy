<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Support\Collection;

interface IOrderRepo
{
    public function getDataToShowRepo(): Collection;
    public function storeRepo(array $data, int $branchId = null): string;
    public function storeOrder(int $admin_id = null, string $price, int $branch_id, int $client_id = null ): Order;
}
