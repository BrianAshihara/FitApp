<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Treino;
use Illuminate\Support\Facades\Auth;

class TreinoComponent extends Component
{

    public $treinos;
    public $nome_treino;
    public $descricao;
    public $id_treino;
    public $updateMode = false;

    protected $rules = [
        'nome_treino' => 'required',
        'descricao' => 'required',
    ];

    public function render()
    {
        if (Auth::check()) {
            $this->treinos = Treino::where('id_usuario', Auth::id())->get();
        } else {
            $this->treinos = collect(); // Retorna uma coleção vazia se o usuário não estiver autenticado
        }
        return view('livewire.treino-component');
    }

    public function resetInputFields()
    {
        $this->nome_treino = '';
        $this->descricao = '';
    }

    public function store()
    {
        $this->validate();

        $userId = Auth::id();

        if (!$userId) {
            session()->flash('message', 'Erro: Usuário não autenticado.');
            return;
        }

        Treino::create([
            'id_usuario' => $userId,
            'nome_treino' => $this->nome_treino,
            'descricao' => $this->descricao,
        ]);

        session()->flash('message', 'Treino criado com sucesso.');

        $this->resetInputFields();
        $this->dispatch('treinoStore'); // Emite um evento para o navegador
    }

    public function edit($id)
    {
        $record = Treino::findOrFail($id);

        $this->id_treino = $id;
        $this->nome_treino = $record->nome_treino;
        $this->descricao = $record->descricao;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->id_treino) {
            $record = Treino::find($this->id_treino);
            $record->update([
                'nome_treino' => $this->nome_treino,
                'descricao' => $this->descricao,
            ]);

            session()->flash('message', 'Treino atualizado com sucesso.');

            $this->resetInputFields();
            $this->updateMode = false;
        }
    }

    public function delete($id)
    {
        Treino::find($id)->delete();
        session()->flash('message', 'Treino deletado com sucesso.');
    }
}
