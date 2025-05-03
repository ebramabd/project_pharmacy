<?php

namespace App\Dtos;

class ProductNumReportsDto
{
    private int $branch;
    private int $product;
    private int $period;

    public function getBranch(): int
    {
        return $this->branch;
    }

    public function setBranch(int $branch): self
    {
        $this->branch = $branch;
        return $this;
    }

    public function getProduct(): int
    {
        return $this->product;
    }

    public function setProduct(int $product): self
    {
        $this->product = $product;
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
