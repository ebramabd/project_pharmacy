<?php

namespace App\Repositories\Implementation;

use App\Models\Admin;
use App\Models\User;
use App\Repositories\IAuthRepo;

class AuthRepository implements IAuthRepo
{
    public function create(array $data): Admin
    {
        return Admin::create($data);
    }

    public function findByUserName(string $userName): ?Admin
    {
        return Admin::where('user_name', $userName)->first();
    }
}
