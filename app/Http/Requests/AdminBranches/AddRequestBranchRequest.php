<?php

namespace App\Http\Requests\AdminBranches;

use App\Dtos\AddRequestBranchDto;
use Illuminate\Foundation\Http\FormRequest;

class AddRequestBranchRequest extends FormRequest
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
            'branch_id'        => 'required',
            'prod_id'          => 'required',
            'quantity_of_prod' => 'required',
        ];
    }

    public function getDto(): AddRequestBranchDto
    {
        $dto = new AddRequestBranchDto() ;
        $dto->setBranchId((int) $this->input('branch_id'))
            ->setProdId((int) $this->input('prod_id'))
            ->setQuantityOfProd((int) $this->input('quantity_of_prod'));
        return $dto;
    }

}

//branch_id:
//prod_id: prod_id,
//quantity_of_prod
