<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BFFormRequest extends FormRequest
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
            "nome_exercicio"=> "required",
            "grupo_muscular" => "required",
            "dificuldade" => "required",
            "instrucoes" => "required",
        ];



        return $rules;
    }

    public function messages(): array {
        return [
            "nome_exercicio"=> "O campo :attribute é obrigatório!",
            "grupo_muscular" => "O campo :attribute é obrigatório!",
            "dificuldade" => "O campo :attribute é obrigatório!",
            "instrucoes" => "O campo :attribute é obrigatório!",
        ];
    }
}
