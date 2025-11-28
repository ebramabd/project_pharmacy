<?php

namespace App\Dtos;

class CategoryDto
{
    private string $cat_name;

    public function getCategoryName(): string
    {
        return $this->cat_name;
    }

    public function setCategoryName($cat_name): self
    {
        $this->cat_name = $cat_name;
        return $this;
    }
}
