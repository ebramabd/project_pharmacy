<?php

namespace App\Dtos;

class ProductDto
{
    private string $prodName;
    private int $catId;
    private int $prod_id;

    public function getProductId(): int
    {
        return $this->prod_id;
    }

    public function setProductId($prodId): self
    {
        $this->prod_id = $prodId;
        return $this;
    }

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
