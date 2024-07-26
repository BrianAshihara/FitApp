<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BF extends Model
{
    use HasFactory;


    protected $fillable = [ 
        "id_usuario", "quantidade_gordura", "data_medicao", 
    ];

    public function rules() {
        return [
            "quantidade_gordura"=> "required",
            "data_medicao" => "required",
        ];

    }

    protected $hiden = [
        "created_at", "updated_at"
    ];


    public function feedback() {
        return [
            "quantidade_gordura"=> "O campo :attribute é obrigatório!",
            "data_medicao" => "O campo :attribute é obrigatório!",
            
        ];
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
