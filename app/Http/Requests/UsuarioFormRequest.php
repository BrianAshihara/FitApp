<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioFormRequest extends FormRequest
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
        $rules = [
            "nome"=> "required",
            "email" => "required",
            "senha" => "required",
            "data_cadastro" => "required",
            "info_perfil" => "required"
        ];


        if ($this->method() == "PUT") {
            $rules['email'] = [
                'required',
                Rule::unique('usuarios')->ignore($this->id)
            ];
        }

        return $rules;
    }

    public function messages(): array {
        return [
            "nome"=> "O campo :attribute é obrigatório!",
            "email" => "O campo :attribute é obrigatório!",
            "senha" => "O campo :attribute é obrigatório!",
            "data_cadastro" => "O campo :attribute é obrigatório!",
            "info_perfil" => "O campo :attribute é obrigatório!"
        ];
    }
}
