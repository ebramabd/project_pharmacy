<?php

namespace App\Dtos;

class BranchRequestDto
{
    private int $requestId;
    private int $prodId;
    private int $branchId;
    private int $quantityOfProduct;

    public function getRequestId(): int
    {
        return $this->requestId;
    }

    public function setRequestId(int $requestId): self
    {
        $this->requestId = $requestId;
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

    public function getBranchId(): int
    {
        return $this->branchId;
    }

    public function setBranchId(int $branchId): self
    {
        $this->branchId = $branchId;
        return $this;
    }

    public function getQuantityOfProduct(): int
    {
        return $this->quantityOfProduct;
    }

    public function setQuantityOfProduct(int $quantityOfProduct): self
    {
        $this->quantityOfProduct = $quantityOfProduct;
        return $this;
    }

}
