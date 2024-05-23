<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HistoricoPesoFormRequest extends FormRequest
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
            "peso"=> "required",
            "data_hora_registro" => "required",
        ];



        return $rules;
    }

    public function messages(): array {
        return [
            "peso"=> "O campo :attribute é obrigatório!",
            "data_hora_registro" => "O campo :attribute é obrigatório!",
        ];
    }
}
