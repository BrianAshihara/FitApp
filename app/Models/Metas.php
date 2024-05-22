<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metas extends Model
{
    use HasFactory;


    protected $fillable = [ 
        "tipo_meta", "valor_meta", "prazo_meta", 
    ];

    public function rules() {
        return [
            "tipo_meta"=> "required",
            "valor_meta" => "required",
            "prazo_meta" => "required",
        ];

    }

    protected $hiden = [
        "created_at", "updated_at"
    ];


    public function feedback() {
        return [
            "tipo_meta"=> "O campo :attribute é obrigatório!",
            "valor_meta" => "O campo :attribute é obrigatório!",
            "prazo_meta" => "O campo :attribute é obrigatório!",
            
        ];
    }
}
