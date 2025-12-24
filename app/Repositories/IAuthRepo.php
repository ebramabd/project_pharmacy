<?php

namespace App\Repositories;

use App\Models\Admin;

interface IAuthRepo
{
    public function create(array $data): Admin;

    public function findByUserName(string $userName): ?Admin;
}
