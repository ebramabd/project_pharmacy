<?php

namespace App\Http\Requests\Admin;

use App\Dtos\AuthDto;
use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'username'=>'required|min:3|max:50',
            'password'=>'required|min:3|max:50',
        ];
    }

    public function getDto():AuthDto
    {
        $dto = new AuthDto() ;
        $dto->setUserName($this->input('username')) ;
        $dto->setPassword($this->input('password')) ;
        return $dto;
    }

}
