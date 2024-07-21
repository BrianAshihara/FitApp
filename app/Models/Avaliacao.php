<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;


    protected $fillable = [ 
        "comentarios", "classificacao", "data_avaliacao", 
    ];

    public function rules() {
        return [
            "comentarios"=> "required",
            "classificacao" => "required",
            "data_avaliacao" => "required",
        ];

    }

    protected $hiden = [
        "created_at", "updated_at"
    ];


    public function feedback() {
        return [
            "comentarios"=> "O campo :attribute é obrigatório!",
            "classificacao" => "O campo :attribute é obrigatório!",
            "data_avaliacao" => "O campo :attribute é obrigatório!",
            
        ];
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_cliente_avaliou');
    }
}
