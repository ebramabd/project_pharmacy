<?php

namespace App\Services;

interface IAuthService
{
    public function registerApi(string $userName, string $password): array;

    public function registerWeb(string $userName, string $password): bool;

    public function loginWeb(string $userName, string $password): bool;

    public function loginApi(string $userName, string $password): array|false;
}
