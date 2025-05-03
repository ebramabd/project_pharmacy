<?php

namespace App\Dtos;

class EditProductDetailsDto
{
    private int $maxQuantity;
    private int $minQuantity;
    private float $price;
    private int $prodId;

    public function getMaxQuantity(): int
    {
        return $this->maxQuantity;
    }

    public function setMaxQuantity(int $maxQuantity): self
    {
        $this->maxQuantity = $maxQuantity;
        return $this ;
    }

    public function getMinQuantity(): int
    {
        return $this->minQuantity;
    }

    public function setMinQuantity(int $minQuantity): self
    {
        $this->minQuantity = $minQuantity;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getProdId(): int
    {
        return $this->prodId;
    }

    public function setProdId(int $prodId): self
    {
        $this->prodId = $prodId;
        return $this;
    }
}
