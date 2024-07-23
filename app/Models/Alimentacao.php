<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimentacao extends Model
{
    use HasFactory;

    protected $table = "alimentacoes";

    protected $fillable = [ 
        "id_usuario","tipo_refeicao", "alimentos_consumidos", "quantidade_calorica", 
    ];

    public function rules() {
        return [
            "tipo_refeicao"=> "required",
            "alimentos_consumidos" => "required",
            "quantidade_calorica" => "required",
        ];

    }

    protected $hiden = [
        "created_at", "updated_at"
    ];


    public function feedback() {
        return [
            "tipo_refeicao"=> "O campo :attribute é obrigatório!",
            "alimentos_consumidos" => "O campo :attribute é obrigatório!",
            "quantidade_calorica" => "O campo :attribute é obrigatório!",
            
        ];
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
