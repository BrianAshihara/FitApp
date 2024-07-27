<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome', 'email', 'senha', 'data_cadastro', 'info_perfil'
    ];

    protected $hidden = [
        'senha',
    ];

    protected $casts = [
        'data_cadastro' => 'datetime',
    ];
    
    public function rules() {
        return [
            "nome"=> "required",
            "email" => "required",
            "senha" => "required",
            "data_cadastro" => "required",
            "info_perfil" => "required"
        ];
    }

    protected $hiden = [
        "created_at", "updated_at"
    ];
    
    public function feedback() {
        return [
            "nome"=> "O campo :attribute é obrigatório!",
            "email" => "O campo :attribute é obrigatório!",
            "senha" => "O campo :attribute é obrigatório!",
            "data_cadastro" => "O campo :attribute é obrigatório!",
            "info_perfil" => "O campo :attribute é obrigatório!"
        ];
    }

    public function treinos()
    {
        return $this->hasMany(Treino::class);
    }

    public function bfs()
    {
        return $this->hasMany(BF::class);
    }

    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class);
    }

    public function historicoPesos()
    {
        return $this->hasMany(HistoricoPeso::class);
    }

    public function registrosSono()
    {
        return $this->hasMany(RegistroSono::class);
    }

    public function metas()
    {
        return $this->hasMany(Metas::class);
    }

    public function alimentacoes()
    {
        return $this->hasMany(Alimentacao::class);
    }

    public function registrosAtividades()
    {
        return $this->hasMany(RegistroAtividade::class);
    }
}

