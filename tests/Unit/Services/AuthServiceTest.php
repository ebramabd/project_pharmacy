<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use App\Services\Implementation\AuthService;
use Tests\Unit\Stubs\AuthRepoStub;

class AuthServiceTest extends TestCase
{
    private AuthService $service;
    private AuthRepoStub $repo;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repo = new AuthRepoStub();
        $this->service = new AuthService($this->repo);
    }


   public function testRegisterCreatesUser()
    {
        $repo = new AuthRepoStub();
        $service = new AuthService($repo);

        $result = $service->register((object)[
            'user_name' => 'new_user',
            'password'  => 'hashed_pass',
        ]);

        $this->assertEquals('new_user', $result->user_name);
        $this->assertCount(2, $repo->all());
    }


    public function testRegisterFailsWhenUsernameExists()
    {
        $result = $this->service->register((object)[
            'user_name' => 'admin',
            'password' => '123456',
        ]);

        $this->assertEquals('user name must be unique', $result);
    }


    public function testLoginReturnsTokenAndUser()
    {
        $result = $this->service->loginSer([
            'user_name' => 'admin',
            'password' => 'any',
        ]);

        $this->assertEquals('fake-token', $result['token']);
        $this->assertEquals('admin', $result['user']->user_name);
    }
}
