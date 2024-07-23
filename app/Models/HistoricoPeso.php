<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoPeso extends Model
{
    use HasFactory;


    protected $fillable = [ 
        "id_usuario","peso", "data_hora_registro", 
    ];

    public function rules() {
        return [
            "peso"=> "required",
            "data_hora_registro" => "required",
        ];

    }

    protected $hiden = [
        "created_at", "updated_at"
    ];


    public function feedback() {
        return [
            "peso"=> "O campo :attribute é obrigatório!",
            "data_hora_registro" => "O campo :attribute é obrigatório!",
            
        ];
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
