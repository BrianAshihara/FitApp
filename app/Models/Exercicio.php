<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    use HasFactory;


    protected $fillable = [ 
        "nome_exercicio", "descricao", "grupo_muscular", "dificuldade", "instrucoes",
    ];

    public function rules() {
        return [
            "nome_exercicio"=> "required",
            "grupo_muscular" => "required",
            "dificuldade" => "required",
            "instrucoes" => "required",
        ];

    }

    protected $hiden = [
        "created_at", "updated_at"
    ];


    public function feedback() {
        return [
            "nome_exercicio"=> "O campo :attribute é obrigatório!",
            "grupo_muscular" => "O campo :attribute é obrigatório!",
            "dificuldade" => "O campo :attribute é obrigatório!",
            "instrucoes" => "O campo :attribute é obrigatório!",
            
        ];
    }
}
