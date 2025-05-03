<?php

namespace App\Dtos;

class ProductDto
{
    private string $prodName;
    private int $catId;

    public function getProdName(): string
    {
        return $this->prodName;
    }

    public function setProdName($prodName): self
    {
        $this->prodName = $prodName;
        return $this;
    }

    public function getCatId(): int
    {
        return $this->catId;
    }

    public function setCatId(int $catId): self
    {
        $this->catId = $catId;
        return $this;
    }
}
