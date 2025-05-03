<?php

namespace App\Dtos;

class AddRequestBranchDto
{
    private int $branchId;
    private int $prodId;
    private int $quantityOfProd;

    public function getBranchId(): int
    {
        return $this->branchId;
    }

    public function setBranchId(int $branchId): self
    {
        $this->branchId = $branchId;
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

    public function getQuantityOfProd(): int
    {
        return $this->quantityOfProd;
    }

    public function setQuantityOfProd(int $quantityOfProd): self
    {
        $this->quantityOfProd = $quantityOfProd;
        return $this;
    }

}
