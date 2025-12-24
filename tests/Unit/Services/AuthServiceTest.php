<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\Implementation\AuthService;
use Tests\Unit\Stubs\AuthRepoStub;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


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


    public function test_register_web_creates_user()
    {
        Auth::shouldReceive('login')->once();

        $repo = new AuthRepoStub();
        $service = new AuthService($repo);

        $result = $service->registerWeb('new_user', '123456');

        $this->assertTrue($result);
    }

    public function test_register_web_fails_when_username_exists()
    {
        $this->expectException(ValidationException::class);

        $repo = new AuthRepoStub();
        $service = new AuthService($repo);

        $service->registerWeb('admin', '123456');
    }
}
