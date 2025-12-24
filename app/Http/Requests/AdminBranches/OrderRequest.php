<?php

namespace App\Http\Requests\AdminBranches;

use App\Dtos\OrderDto;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'options'  => 'required',
            'quantity' => 'required',
            'branch_id' => 'nullable',
        ];
    }

    public function getDto(): OrderDto
    {
        $dto = new OrderDto() ;
        $dto->setOptions((array) $this->input('options'))
        ->setQuantity((array) $this->input('quantity'))
        ->setBranchId($this->input('branch_id'))
        ;
        return $dto;
    }

}
