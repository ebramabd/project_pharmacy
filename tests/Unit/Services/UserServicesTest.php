<?php

namespace Tests\Unit\Services;

use App\Dtos\UserDto;
use App\Models\Admin;
use App\Repositories\Implementation\UserRepo;
use App\Services\Implementation\UserService;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Tests\Unit\Stubs\UserRepoStub;

class UserServicesTest extends TestCase
{
    public function testCreateUser()
    {
        $services = $this->createAdminServicesObj();

        $dtoObj = new UserDto();
        $dtoObj->setUserName('abram');
        $dtoObj->setBranchId(1);
        $dtoObj->setPassword(Hash::make('abram123'));
        $dtoObj->setType('admin');

        $user =  $services->saveService($dtoObj);
        $this->assertInstanceOf(Admin::class, $user);

    }

    public function testUpdateUser()
    {
        $services = $this->createAdminServicesObj();

        $dtoObj = new UserDto();
        $dtoObj->setUserName('abram');
        $dtoObj->setBranchId(1);
        $dtoObj->setPassword(Hash::make('abram123'));
        $dtoObj->setType('admin');

        $user =  $services->saveService($dtoObj, 1);
        $this->assertInstanceOf(Admin::class, $user);

    }

    public function testGetOneAdmin()
    {
        $services = $this->createAdminServicesObj();
        $user = $services->getOneService(1);
        $this->assertInstanceOf(Admin::class, $user);
    }

    private function createAdminServicesObj(): UserService
    {
        return new UserService(new UserRepoStub());
    }
}
