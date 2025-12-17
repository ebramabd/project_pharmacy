<?php

namespace App\Repositories\Implementation;

use App\Models\Admin;
use App\Repositories\IAuthRepo;
use App\Trait\Crud;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements IAuthRepo
{
    use Crud ;


    public function register($data)
    {
        $user = new Admin() ;

        $userChecked = $this->getOneObject($user, 'user_name', $data['user_name']) ;
        if (!empty($userChecked)) {
            return 'user name must be unique';
        }
        $createDataUser = [
            'user_name' => $data['user_name'] ,
            'password'  => $data['password'] ,
            'type'      => 'user',
            'branch_id' => null ,
        ];
        return $this->save($user, $createDataUser) ;
    }

    public function loginRepo($data)
    {
        $user        = new Admin() ;
        $dataWhere   = ['user_name' => $data['user_name']];
        $userChecked = $this->getOneObject($user, $dataWhere) ;
        if (!$userChecked || !Hash::check($data['password'], $userChecked->password)) {
            return response()->json(['message' => 'check your data'], 401);
        }
        $token = $userChecked->createToken('YourAppName')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user'  => $userChecked,
        ]);
    }


}
