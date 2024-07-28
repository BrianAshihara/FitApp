<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\HistoricoPeso;
use Illuminate\Support\Facades\Auth;


class HistoricoPesoComponent extends Component
{
    public $historicoPesos;
    public $peso;
    public $data_hora_registro;
    public $id_hist_peso;
    public $updateMode = false;

    protected $rules = [
        'peso' => 'required',
        'data_hora_registro' => 'required|date',
    ];

    public function render()
    {

        if (Auth::check()) {
            $this->historicoPesos = HistoricoPeso::where('id_usuario', Auth::id())->get();
        } else {
            $this->historicoPesos = collect(); // Retorna uma coleção vazia se o usuário não estiver autenticado
        }


        return view('livewire.historico-peso-component');
    }

    

    public function store(){
        $this->validate();

        $userId = Auth::id();

        if (!$userId) {
            session()->flash('message', 'Erro: Usuário não autenticado.');
            return;
        }


        HistoricoPeso::create([
            'id_usuario' => $userId,
            'peso' => $this->peso,
            'data_hora_registro' => $this->data_hora_registro,
        ]);

        session()->flash('message', 'Histórico de peso criado com sucesso!');
        $this->resetInputFields();
        $this->dispatch('historicoPesoStore');
    }

    public function edit($id){

        $historico_peso = HistoricoPeso::findOrFail($id);

        if($historico_peso){
            $this->peso = $historico_peso->peso;
            $this->data_hora_registro = $historico_peso->data_hora_registro;
            $this->id_hist_peso = $id;
            $this->updateMode = true;
        } else {
            session()->flash('error', 'Histórico de peso não encontrado.');
        }
    }

    public function update(){
        $this->validate();

        if ($this->id_hist_peso) {
            $historico_peso = HistoricoPeso::find($this->id_hist_peso);
            $historico_peso->update([
                'peso' => $this->peso,
                'data_hora_registro' => $this->data_hora_registro,
            ]);

            session()->flash('message', 'Historico de peso atualizado com sucesso!');
            $this->resetInputFields();
        } else {
            session()->flash('error', 'Historico de peso não encontrado.');
        }
    }

    public function delete($id){

        $historico_peso = HistoricoPeso::find($id);

        if($historico_peso){
            $historico_peso->delete();
            session()->flash('message', 'Histórico de peso deletado com sucesso!');
        } else {
            session()->flash('error', 'Histórico de peso não encontrado.');
        }
    }

    private function resetInputFields(){
        $this->peso = '';
        $this->data_hora_registro = '';
    }
}
