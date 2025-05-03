<?php

namespace App\Dtos;

class AuthDto
{
    private $user_name ;
    private $password ;

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name): void
    {
        $this->user_name = $user_name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return array{
     *  'user_name': string,
     *  'password': string
     * }
     */
    public function getData(): array
    {
        return [
            'user_name' => $this->getUserName(),
            'password' => $this->getPassword(),
        ];
    }
}
