<?php

namespace App\Http\Requests\AdminBranches;

use App\Dtos\EditProductDetailsDto;
use Illuminate\Foundation\Http\FormRequest;

class EditProductDetailsRequest extends FormRequest
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
            'max_quantity'=>'required',
            'min_quantity'=>'required',
            'price'=>'required',
            'prod_id'=>'required',
        ];
    }

    public function getDto():EditProductDetailsDto
    {
        $dto = new EditProductDetailsDto() ;
        $dto->setMaxQuantity((int) $this->input('max_quantity'))
            ->setMinQuantity((int) $this->input('min_quantity'))
            ->setPrice((float) $this->input('price'))
            ->setProdId((int) $this->input('prod_id'));
        return $dto;
    }

}

