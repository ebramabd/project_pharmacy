<?php

namespace App\Http\Requests\Admin;

use App\Dtos\BranchesOrdersReportsDto;
use Illuminate\Foundation\Http\FormRequest;

class BranchesOrdersReportsRequest extends FormRequest
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
            'branch_id' => 'required',
            'period'    => 'required',
        ];
    }

    public function getDto(): BranchesOrdersReportsDto
    {
        $dto = new BranchesOrdersReportsDto();
        $dto->setBranchId((int) $this->input('branch_id'))
            ->setPeriod((int) $this->input('period'));
        return $dto;
    }

}
