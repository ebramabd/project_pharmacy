<?php

namespace App\Http\Requests\Admin;

use App\Dtos\BranchDto;
use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'branch_name' => 'required|min:3|max:50',
        ];
    }

    public function getDto(): BranchDto
    {
        $dto = new BranchDto();
        $dto->setBranchName($this->input('branch_name'));
        return $dto;
    }

}
