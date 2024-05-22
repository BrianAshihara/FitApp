<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlimentacaoFormRequest extends FormRequest
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
            "tipo_refeicao"=> "required",
            "alimentos_consumidos" => "required",
            "quantidade_calorica" => "required",
        ];



        return $rules;
    }

    public function messages(): array {
        return [
            "tipo_refeicao"=> "O campo :attribute é obrigatório!",
            "alimentos_consumidos" => "O campo :attribute é obrigatório!",
            "quantidade_calorica" => "O campo :attribute é obrigatório!",
        ];
    }
}
