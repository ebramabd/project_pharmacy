<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface ICreateRequestRepo
{
    public function addRequestRepo(array $data): void;
    public function updateStoreRepo(array $data): void;
    public function getProductFromBranchRepo(): Collection;
}
