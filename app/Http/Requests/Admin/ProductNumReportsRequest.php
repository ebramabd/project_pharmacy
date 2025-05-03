<?php

namespace App\Http\Requests\Admin;

use App\Dtos\BranchesOrdersReportsDto;
use App\Dtos\ProductNumReportsDto;
use Illuminate\Foundation\Http\FormRequest;

class ProductNumReportsRequest extends FormRequest
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
            'branch'=>'required',
            'product'=>'required',
            'period'=>'required',
        ];
    }

    public function getDto():ProductNumReportsDto
    {
        $dto = new ProductNumReportsDto();
        $dto->setBranch((int) $this->input('branch'))
            ->setProduct((int) $this->input('product'))
            ->setPeriod((int) $this->input('period'));
        return $dto;
    }

}
