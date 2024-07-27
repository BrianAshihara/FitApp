<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroSono extends Model
{
    use HasFactory;

    protected $table = 'registros_sono';

    protected $fillable = [ 
        "id_usuario", "tempo_sono", "qualidade_sono", "data_registro",
    ];

    public function rules() {
        return [
            "tempo_sono"=> "required",
            "qualidade_sono" => "required",
            "data_registro" => "required",
        ];

    }

    protected $hiden = [
        "created_at", "updated_at"
    ];

    public function feedback() {
        return [
            "tempo_sono"=> "O campo :attribute é obrigatório!",
            "qualidade_sono" => "O campo :attribute é obrigatório!",
            "data_registro" => "O campo :attribute é obrigatório!",

        ];
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
