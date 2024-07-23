<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class RegistroAtividade extends Model
{
    use HasFactory;


    protected $fillable = [ 
        "id_usuario", "tipo_atividade", "distancia_percorrida", "duracao_atividade", "calorias_queimadas", "data_hora_atividade",
    ];

    public function rules() {
        return [
            "tipo_atividade"=> "required",
            "distancia_percorrida" => "required",
            "duracao_atividade" => "required",
            "calorias_queimadas" => "required",
            "data_hora_atividade" => "required",
        ];
    }

    protected $hiden = [
        "created_at", "updated_at"
    ];


    public function feedback() {
        return [
            "tipo_atividade"=> "O campo :attribute é obrigatório!",
            "distancia_percorrida" => "O campo :attribute é obrigatório!",
            "duracao_atividade" => "O campo :attribute é obrigatório!",
            "calorias_queimadas" => "O campo :attribute é obrigatório!",
            "data_hora_atividade" => "O campo :attribute é obrigatório!",
            
        ];
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
