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
            "tempo_sono"=> "required",
            "qualidade_sono" => "required",
            "data_registro" => "required",
        ];


        return $rules;
    }

    public function messages(): array {
        return [
            "tempo_sono"=> "O campo :attribute é obrigatório!",
            "qualidade_sono" => "O campo :attribute é obrigatório!",
            "data_registro" => "O campo :attribute é obrigatório!",
        ];
    }
}
