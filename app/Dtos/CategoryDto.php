<?php

namespace App\Dtos;

class CategoryDto
{
    private string $cat_name;
    private int $cat_id_for_test;

    public function getCategoryName(): string
    {
        return $this->cat_name;
    }

    public function setCategoryName($cat_name): self
    {
        $this->cat_name = $cat_name;
        return $this;
    }

    public function getCategoryIdForTest(): int
    {
        return $this->cat_id_for_test;
    }

    public function setCategoryIdForTest($cat_id_for_test): self
    {
        $this->cat_id_for_test = $cat_id_for_test;
        return $this;
    }
}
