<?php
namespace Tests\Unit\Stubs;

use App\Repositories\IAuthRepo;
use App\Models\Admin;

class AuthRepoStub implements IAuthRepo
{
    private array $users = [];

    public function __construct()
    {
        $this->users[] = new Admin([
            'id' => 1,
            'user_name' => 'admin',
            'password' => bcrypt('password'),
        ]);
    }

    public function create(array $data): Admin
    {
        $user = new Admin($data);
        $user->id = count($this->users) + 1;
        $this->users[] = $user;
        return $user;
    }

    public function findByUserName(string $userName): ?Admin
    {
        foreach ($this->users as $user) {
            if ($user->user_name === $userName) {
                return $user;
            }
        }
        return null;
    }

    // helper for testing
    public function count(): int
    {
        return count($this->users);
    }
}
