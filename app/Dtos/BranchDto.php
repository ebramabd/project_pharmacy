<?php

namespace App\Dtos;

class BranchDto
{
    private string $branchName;
    private int $branchId;
    public function getBranchName(): string
    {
        return $this->branchName;
    }

    public function setBranchName(string $branchName): self
    {
        $this->branchName = $branchName;
        return $this;
    }

    public function getBranchId():int
    {
        return $this->branchId;
    }

    public function setBranchId(int $branchId): self
    {
        $this->branchId = $branchId;
        return $this;
    }
}
