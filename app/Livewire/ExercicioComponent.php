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
        'dificuldade'=> 'required',
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

    public function store()
    {

        $this->validate();
    
        $userId = Auth::id();
    
        if (!$userId){
            session()->flash('message', 'Erro: Usuário não autenticado.');
            return;
        }
    
        Exercicio::create([
            'id_usuario' => $userId,
            'nome_exercicio' => $this->nome_exercicio,
            'descricao_exercicio' => $this->descricao_exercicio,
            'grupo_muscular' => $this->grupo_muscular,
            'dificuldade' => $this->dificuldade,
            'instrucoes' => $this->instrucoes,
        ]);
    
        session()->flash('message', 'Exercício criado com sucesso!');
        $this->resetInputFields();
        $this->dispatch('exercicioStore');
    }

    public function edit($id)
    {
        $exercicio = Exercicio::findOrFail($id);

        $this->id_exercicio = $id;
        $this->nome_exercicio = $exercicio->nome_exercicio;
        $this->descricao_exercicio = $exercicio->descricao_exercicio;
        $this->grupo_muscular = $exercicio->grupo_muscular;
        $this->dificuldade = $exercicio->dificuldade;
        $this->instrucoes = $exercicio->instrucoes;

        $this->updateMode = true;
        
    }

    public function update()
    {
        $this->validate();

        if ($this->id_exercicio){
            $exercicio = Exercicio::find($this->id_exercicio);

            $exercicio->update([
                'nome_exercicio' => $this->nome_exercicio,
                'descricao_exercicio' => $this->descricao_exercicio,
                'grupo_muscular' => $this->grupo_muscular,
                'dificuldade' => $this->dificuldade,
                'instrucoes' => $this->instrucoes,
            ]);

            session()->flash('message', 'Exercício atualizado com sucesso!');
            $this->resetInputFields();
            $this->updateMode = false;
        }
    }

    public function delete($id)
    {
        $exercicio = Exercicio::find($id);

        Exeercicio::find($id)->delete();
        session()->flash('message', 'Exercício deletado com sucesso!');
    }

    
}
