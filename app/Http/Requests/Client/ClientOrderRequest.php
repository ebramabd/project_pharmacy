<?php

namespace App\Http\Requests\Client;

use App\Dtos\ClientOrderDto;
use Illuminate\Foundation\Http\FormRequest;

class ClientOrderRequest extends FormRequest
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
            'userName'       => 'required',
            'branchName'     => 'required',
            'productName'    => 'required',
            'quantityOfProd' => 'required',
        ];
    }

    public function getDto(): ClientOrderDto
    {
        $dto = new ClientOrderDto() ;
        $dto->setUserName($this->input('userName'))
            ->setBranchName($this->input('branchName'))
            ->setProductName($this->input('productName'))
            ->setQuantityOfProd($this->input('quantityOfProd'));
        return $dto;
    }

}

//branch_id:
//prod_id: prod_id,
//quantity_of_prod
