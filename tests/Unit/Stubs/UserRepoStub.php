<?php

namespace Tests\Unit\Stubs;

use App\Models\Admin;
use App\Models\Branch;
use App\Models\User;
use App\Repositories\IUserRepo;
use PHPUnit\Framework\TestCase;

class UserRepoStub extends TestCase implements IUserRepo
{
    private $userData = [];
    public function __construct()
    {
        $user = new Admin();
        $user->user_name = "user1";
        $user->branch_id = 1;

        $user2 = new Admin();
        $user2->user_name = "user2";
        $user2->branch_id = 2;

        $this->userData[1] = $user;
        $this->userData[2] = $user2;


        $branch = new Branch();
    }

    public function saveRepo(array $data, int $id = null): Admin
    {
        $user = new Admin();
        $user->user_name = $data["user_name"];
        $user->branch_id = $data["branch_id"];

        //update user
        if ($id){
          $this->userData[$id] = $user;
        }

        //create user
        $this->userData[count($this->userData) - 1] = $user;
        return $user;
    }

    public function getOneRepo(int $id): Admin
    {
        if (is_null($id)) {
            return new Admin();
        }
        return $this->userData[$id];
    }

    public function deleteRepo(int $id): void
    {
        unset($this->userData[$id]);
    }

    public function getBranchNameRepo(): array
    {
           return array_map(function ($user) {
            return [
                'user_name' => $user->user_name,
                'branch_id' => $user->branch_id,
            ];
        }, $this->userData);
    }
}
