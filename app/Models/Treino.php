<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    use HasFactory;


    protected $fillable = [ 
        "nome_treino", "descricao", 
    ];

    public function rules() {
        return [
            "nome_treino"=> "required",
            "descricao" => "required",
        ];

    }

    protected $hiden = [
        "created_at", "updated_at"
    ];


    public function feedback() {
        return [
            "nome_treino"=> "O campo :attribute é obrigatório!",
            "descricao" => "O campo :attribute é obrigatório!",
            
        ];
    }
}
