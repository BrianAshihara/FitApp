<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroSono extends Model
{
    use HasFactory;


    protected $fillable = [ 
        "tempo_sono", "qualidade_sono", "data_registro",
    ];

    public function rules() {
        return [
            "tempo_sono"=> "required",
            "qualidade_sono" => "required",
            "data_registro" => "required",
        ];

    }


    public function feedback() {
        return [
            "tempo_sono"=> "O campo :attribute é obrigatório!",
            "qualidade_sono" => "O campo :attribute é obrigatório!",
            "data_registro" => "O campo :attribute é obrigatório!",

        ];
    }
}
