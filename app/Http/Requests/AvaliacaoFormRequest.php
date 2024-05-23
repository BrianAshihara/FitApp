<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AvaliacaoFormRequest extends FormRequest
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
            "comentarios"=> "required",
            "classificacao" => "required",
            "data_avaliacao" => "required",
        ];



        return $rules;
    }

    public function messages(): array {
        return [
            "comentarios"=> "O campo :attribute é obrigatório!",
            "classificacao" => "O campo :attribute é obrigatório!",
            "data_avaliacao" => "O campo :attribute é obrigatório!",
        ];
    }
}
