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
            "quantidade_gordura"=> "required",
            "data_medicao" => "required",
        ];



        return $rules;
    }

    public function messages(): array {
        return [
            "quantidade_gordura"=> "O campo :attribute é obrigatório!",
            "data_medicao" => "O campo :attribute é obrigatório!",
        ];
    }
}
