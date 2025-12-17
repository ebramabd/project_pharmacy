<?php

namespace Tests\Unit\Stubs;

use App\Repositories\IAuthRepo;
use Illuminate\Support\Collection;

class AuthRepoStub implements IAuthRepo
{
    private Collection $users;

    public function __construct()
    {
        $this->users = collect([
            (object)[
                'id' => 1,
                'user_name' => 'admin',
                'password' => 'hashed_password',
            ],
        ]);
    }

    public function register($data)
    {
        $exists = $this->users->firstWhere('user_name', $data['user_name']);

        if ($exists) {
            return 'user name must be unique';
        }

        $user = (object)[
            'id' => $this->users->count() + 1,
            'user_name' => $data['user_name'],
            'password' => $data['password'],
        ];

        $this->users->push($user);

        return $user;
    }

    public function loginRepo($data)
    {
        $user = $this->users->firstWhere('user_name', $data['user_name']);

        if (!$user) {
            return null;
        }

        return [
            'token' => 'fake-token',
            'user'  => $user,
        ];
    }

    public function all(): Collection
    {
        return $this->users;
    }
}
