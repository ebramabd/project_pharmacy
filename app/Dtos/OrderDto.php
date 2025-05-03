<?php

namespace App\Dtos;

class OrderDto
{
    private array $options;
    private array $quantity;

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
}
