<?php

namespace App\Services;

use App\Dtos\UserDto;
use App\Models\Admin;

interface IUserService
{

    /**
     * @param UserDto $dto this passed data of user .
     * @param int $id check id if exist this function updated if not this new user.
     * @return Admin user data or false if not found.
     */
    public function saveService(UserDto $dto, int $id = null): Admin ;

    /**
     * @param int $id.
     * @return void
     */
    public function deleteService(int $id): void;

    /**
     * @param int $id.
     * @return Admin user data or false if not found.
     */
    public function getOneService(int $id): Admin;

    /**
     * @return array.
     */
    public function getBranchNameService(): array;
}
