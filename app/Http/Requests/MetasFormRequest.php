<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MetasFormRequest extends FormRequest
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
            "tipo_meta"=> "required",
            "valor_meta" => "required",
            "prazo_meta" => "required",
        ];



        return $rules;
    }

    public function messages(): array {
        return [
            "tipo_meta"=> "O campo :attribute é obrigatório!",
            "valor_meta" => "O campo :attribute é obrigatório!",
            "prazo_meta" => "O campo :attribute é obrigatório!",
        ];
    }
}
