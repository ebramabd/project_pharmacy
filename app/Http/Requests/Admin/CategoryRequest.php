<?php

namespace App\Http\Requests\Admin;

use App\Dtos\CategoryDto;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cat_name' => 'required|min:3|max:50',
        ];
    }

    public function getDto(): CategoryDto
    {
        $dto = new CategoryDto() ;
        $dto->setCategoryName($this->input('cat_name')) ;
        return $dto;
    }

}
