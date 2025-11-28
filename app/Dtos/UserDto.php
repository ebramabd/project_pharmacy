<?php

namespace App\Dtos;

class UserDto
{
    private string $userName ;
    private string $password;
    private string $type ;
    private int $branchId ;

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName($userName): self
    {
        $this->userName = $userName;
        return $this ;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password): self
    {
        $this->password = $password;
        return $this ;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type): self
    {
        $this->type = $type;
        return $this ;
    }

    /**
     * @return int
     */
    public function getBranchId()
    {
        return $this->branchId;
    }

    /**
     * @param int $branchId
     */
    public function setBranchId($branchId): self
    {
        $this->branchId = $branchId;
        return $this ;
    }

}
