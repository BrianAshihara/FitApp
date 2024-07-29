<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Avaliacao;
use Illuminate\Support\Facades\Auth;

class AvaliacaoComponent extends Component
{

    public $comentarios;
    public $classificacao;
    public $data_avaliacao;
    public $id_avaliacao;
    public $avaliacoes;
    public $updateMode = false;

    protected $rules = [
    
        'comentarios' => 'required',
        'classificacao' => 'required,',
        'data_avaliacao' => 'required|date',

    ];

    public function render()
    {

        if (Auth::check()) {
            $this->avaliacoes = Avaliacao::where('id_usuario', Auth::id())->get();
        } else {
            $this->avaliacoes = collect(); // Retorna uma coleção vazia se o usuário não estiver autenticado
        }
        return view('livewire.avaliacao-component');
    }

    public function store(){
        $this->validate();

        $userId = Auth::id();

        if (!$userId) {
            session()->flash('message', 'Erro: Usuário não autenticado.');
            return;
        }

            Avaliacao::create([
            'id_usuario' => $userId,
            'comentarios' => $this->comentarios,
            'classificacao' => $this->classificacao,
            'data_avaliacao' => $this->data_avaliacao,
        ]);

        session()->flash('message', 'Avaliação registrada  com sucesso!');
        $this->resetInputFields();
        $this->dispatch('avaliacaoStore');
    }

    public function edit($id){

        $avaliacao = Avaliacao::findOrFail($id);

        if($avaliacao){
            $this->id_avaliacao = $id;
            $this->comentarios = $avaliacao->comentarios;
            $this->classificacao = $avaliacao->classificacao;
            $this->data_avaliacao = $avaliacao->data_avaliacao;
            $this->updateMode = true;
        } else {
            session()->flash('error', 'Avaliação não encontrada.');
        }
    }

    public function update(){
        $this->validate();


        if ($this->id_avaliacao) {
            $avaliacao = Avaliacao::find($this->id_avaliacao);
            $avaliacao->update([
                'comentarios' => $this->comentarios,
                'classificacao' => $this->classificacao,
                'data_avaliacao' => $this->data_avaliacao,
            ]);

            session()->flash('message', 'Avaliação atualizada com sucesso!');
            $this->resetInputFields();
        } else {
            session()->flash('error', 'Avaliação não encontrada.');
        }
    }

    public function delete($id){

        $avaliacao = Avaliacao::find($id);

        if($avaliacao){
            $avaliacao->delete();
            session()->flash('message', 'Avaliação deletada com sucesso!');
        } else {
            session()->flash('error', 'Avaliação não encontrada.');
        }
    }

    private function resetInputFields(){
        $this->comentarios = '';
        $this->classificacao = '';
        $this->data_avaliacao = '';
    }
}
