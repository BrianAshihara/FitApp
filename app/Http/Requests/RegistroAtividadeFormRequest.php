<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistroAtividadeFormRequest extends FormRequest
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
            "tipo_atividade"=> "required",
            "distancia_percorrida" => "required",
            "duracao_atividade" => "required",
            "calorias_queimadas" => "required",
            "data_hora_atividade" => "required",
        ];



        return $rules;
    }

    public function messages(): array {
        return [
            "tipo_atividade"=> "O campo :attribute é obrigatório!",
            "distancia_percorrida" => "O campo :attribute é obrigatório!",
            "duracao_atividade" => "O campo :attribute é obrigatório!",
            "calorias_queimadas" => "O campo :attribute é obrigatório!",
            "data_hora_atividade" => "O campo :attribute é obrigatório!",
        ];
    }
}
