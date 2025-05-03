<?php

namespace App\Dtos;

class BranchDto
{
    private string $branchName;

    public function getBranchName(): string
    {
        return $this->branchName;
    }

    public function setBranchName(string $branchName): self
    {
        $this->branchName = $branchName;
        return $this;
    }
}
