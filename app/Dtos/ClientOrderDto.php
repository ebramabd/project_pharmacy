<?php

namespace App\Dtos;

class ClientOrderDto
{
    private string $userName;
    private string $branchName;
    private string $productName;
    private string $quantityOfProd;

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;
        return $this;
    }

    public function getBranchName(): string
    {
        return $this->branchName;
    }

    public function setBranchName(string $branchName): self
    {
        $this->branchName = $branchName;
        return $this;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): self
    {
        $this->productName = $productName;
        return $this;
    }

    public function getQuantityOfProd(): string
    {
        return $this->quantityOfProd;
    }

    public function setQuantityOfProd(string $quantityOfProd): self
    {
        $this->quantityOfProd = $quantityOfProd;
        return $this;
    }
}
