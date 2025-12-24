<?php

namespace App\Dtos;

class OrderDto
{
    private array $options;
    private array $quantity;
    private ?int $branchId = null;

    public function getOptions(): array
    {
        return $this->options;
    }

    public function setOptions(array $options): self
    {
        $this->options = $options;
        return $this;
    }

    public function getQuantity(): array
    {
        return $this->quantity;
    }

    public function setQuantity(array $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }


    public function getBranchId(): int|null
    {
        return $this->branchId;
    }

    public function setBranchId(int $branchId): self
    {
        $this->branchId = $branchId;
        return $this;
    }

}
