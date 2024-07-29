<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Exercicio;
use Illuminate\Support\Facades\Auth;

class ExercicioComponent extends Component
{
    public $exercicios;
    public $id_treino;
    public $nome_exercicio;
    public $descricao_exercicio;
    public $grupo_muscular;
    public $dificuldade;
    public $instrucoes;
    public $updateMode = false;

    protected $rules = [
        'nome_exercicio' => 'required',
        'descricao_exercicio' => 'required',
        'grupo_muscular'=> 'required',
        'dificuldades'=> 'required',
        'instrucoes'=> 'required',
    ];

    public function render()
    {
        if (Auth::check()){
            $this->exercicios = Exercicio::where('id_usuario', Auth::id())->get();
        }else{
            $this->exercicios = collect();
        }

        return view('livewire.exercicio-component');
    }

    
}
