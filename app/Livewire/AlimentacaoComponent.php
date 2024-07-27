<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Alimentacao;
use Illuminate\Support\Facades\Auth;

class AlimentacaoComponent extends Component
{

    public $tipo_refeicao;
    public $alimentos_consumidos;
    public $quantidade_calorica;
    public $id_alm;
    public $updateMode = false;
    public $alimentacoes;

    protected $rules = [
        'tipo_refeicao' => 'required|string',
        'alimentos_consumidos' => 'required|string',
        'quantidade_calorica' => 'required|integer',
    ];

    public function render()
    {

        if (Auth::check()) {
            $this->alimentacoes = Alimentacao::where('id_usuario', Auth::id())->get();
        } else {
            $this->alimentacoes = collect(); // Retorna uma coleção vazia se o usuário não estiver autenticado
        }

        return view('livewire.alimentacao-component');
    }

    public function store(){
        $this->validate();

        $userId = Auth::id();

        if (!$userId) {
            session()->flash('message', 'Erro: Usuário não autenticado.');
            return;
        }

            Alimentacao::create([
            'id_usuario' => $userId,
            'tipo_refeicao' => $this->tipo_refeicao,
            'alimentos_consumidos' => $this->alimentos_consumidos,
            'quantidade_calorica' => $this->quantidade_calorica,
        ]);

        session()->flash('message', 'Refeição registrada criado com sucesso!');
        $this->resetInputFields();
        $this->dispatch('alimentacaoStore');
    }

    public function edit($id){

        $alimentacao = Alimentacao::findOrFail($id);

        if($alimentacao){
            $this->id_alm = $id;
            $this->tipo_refeicao = $alimentacao->tipo_refeicao;
            $this->alimentos_consumidos = $alimentacao->alimentos_consumidos;
            $this->quantidade_calorica = $alimentacao->quantidade_calorica;
            $this->updateMode = true;
        } else {
            session()->flash('error', 'Refeição não encontrada.');
        }
    }

    public function update(){
        $this->validate();


        if ($this->id_alm) {
            $alimentacao = Alimentacao::find($this->id_alm);
            $alimentacao->update([
                'tipo_refeicao' => $this->tipo_refeicao,
                'alimentos_consumidos' => $this->alimentos_consumidos,
                'quantidade_calorica' => $this->quantidade_calorica,
            ]);

            session()->flash('message', 'Refeição atualizada com sucesso!');
            $this->resetInputFields();
        } else {
            session()->flash('error', 'Refeição não encontrada.');
        }
    }

    public function delete($id){

        $alimentacao = Alimentacao::find($id);

        if($alimentacao){
            $alimentacao->delete();
            session()->flash('message', 'Refeição deletada com sucesso!');
        } else {
            session()->flash('error', 'Refeição não encontrada.');
        }
    }

    private function resetInputFields(){
        $this->tipo_refeicao = '';
        $this->alimentos_consumidos = '';
        $this->quantidade_calorica = '';
    }
}
