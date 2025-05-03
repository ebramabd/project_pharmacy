<?php

namespace App\Http\Requests\Admin;

use App\Dtos\BranchDto;
use App\Dtos\BranchRequestDto;
use Illuminate\Foundation\Http\FormRequest;

class BranchRequestRequest extends FormRequest
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
            'id_request'=>'required',
            'prod_id'=>'required',
            'branch_id'=>'required',
            'quantity_of_prod'=>'required',
        ];
    }

    public function getDto(): BranchRequestDto
    {
        $dto = new BranchRequestDto();
        $dto->setRequestId((int) $this->input('id_request'))
            ->setBranchId((int) $this->input('branch_id'))
            ->setProdId((int) $this->input('prod_id'))
            ->setQuantityOfProduct((int) $this->input('quantity_of_prod'));
        return $dto;
    }
}

