<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;


    protected $fillable = [ 
        "nome", "email", "senha", "data_cadastro", "info_perfil"
    ];

    public function rules() {
        return [
            "nome"=> "required",
            "email" => "required",
            "senha" => "required",
            "data_cadastro" => "required",
            "info_perfil" => "required"
        ];
    }


    public function feedback() {
        return [
            "nome"=> "O campo :attribute é obrigatório!",
            "email" => "O campo :attribute é obrigatório!",
            "senha" => "O campo :attribute é obrigatório!",
            "data_cadastro" => "O campo :attribute é obrigatório!",
            "info_perfil" => "O campo :attribute é obrigatório!"
        ];
    }
}
