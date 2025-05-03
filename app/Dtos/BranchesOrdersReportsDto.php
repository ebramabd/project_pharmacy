<?php

namespace App\Dtos;

class BranchesOrdersReportsDto
{
    private int $branchId;
    private int $period;

    public function getBranchId(): int
    {
        return $this->branchId;
    }

    public function setBranchId(int $branchId): self
    {
        $this->branchId = $branchId;
        return $this;
    }

    public function getPeriod(): int
    {
        return $this->period;
    }

    public function setPeriod(int $period): self
    {
        $this->period = $period;
        return $this;
    }
}
