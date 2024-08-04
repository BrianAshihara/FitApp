<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exemplo extends Model
{

    protected $table = 'exemplos';

    use HasFactory;


    protected $fillable = [ 
        "id_usuario", "comida_fav" 
    ];

    public function rules() {
        return [
            "comida_fav"=> "required",

        ];

    }

    protected $hiden = [
        "created_at", "updated_at"
    ];


    public function feedback() {
        return [
            "comida_fav"=> "O campo :attribute é obrigatório!",
            
        ];
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
