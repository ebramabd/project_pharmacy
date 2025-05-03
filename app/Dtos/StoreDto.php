<?php

namespace App\Dtos;

class StoreDto
{
    private int $branch_id ;

    public function getBranchId(): int
    {
        return $this->branch_id;
    }

    public function setBranchId(int $branch_id): self
    {
        $this->branch_id = $branch_id;
        return $this ;
    }
}
