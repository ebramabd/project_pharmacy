<?php

namespace App\Services\Implementation;

use App\Dtos\UserDto;
use App\Models\Admin;
use App\Repositories\Implementation\UserRepo;
use App\Repositories\IUserRepo;
use App\Services\IUserService;
use Illuminate\Support\Facades\Hash;

class UserService implements IUserService
{
    public function __construct(private IUserRepo $userRepo)
    {
    }

    //    public function ShowAllService()
    //    {
    //        return $this->userRepo->getAllRepo();
    //    }

    public function saveService(UserDto $dto, int $id = null): Admin
    {
        $data              = [];
        $data['user_name'] = $dto->getUserName() ;
        $data['password']  = Hash::make($dto->getPassword()) ;
        $data['type']      = $dto->getType() ;
        $data['branch_id'] = $dto->getBranchId();
        if ($data['type'] == 'admin_panel') {
            $data['branch_id'] = null;
        }
        $user = $this->userRepo->saveRepo($data, $id) ;
        return $user;
    }

    public function deleteService(int $id): void
    {
        $this->userRepo->deleteRepo($id);
    }

    public function getOneService(int $id = null): Admin
    {
        return $this->userRepo->getOneRepo($id) ;
    }

    public function getBranchNameService(): array
    {
        return $this->userRepo->getBranchNameRepo();
    }

}
