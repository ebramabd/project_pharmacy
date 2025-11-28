<?php

namespace App\Http\Requests\Admin;

use App\Dtos\ProductDto;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'prod_name' => 'required|min:3|max:50',
            'cat_id'    => 'required',
        ];
    }

    public function getDto(): ProductDto
    {
        $dto = new ProductDto() ;
        $dto
            ->setProdName($this->input('prod_name'))
            ->setCatId((int) $this->input('cat_id'))
        ;

        return $dto;
    }
}
