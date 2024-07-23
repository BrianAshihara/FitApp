<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\HistoricoPeso;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoricoPesoComponent extends Component
{
    public $id_usuario;
    public $peso;
    public $data_hora_registro;
    public $id_hist_peso;
    public $updateMode = false;

    public function render()
    {

        $historicoPesos = HistoricoPeso::where('id_usuario', $this->id_usuario)->get();

        $hist_peso = HistoricoPeso::all();
        return view('livewire.historico-peso-component', compact('hist_peso'));
    }

    

    public function store(){
        $this->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'peso' => 'required|numeric',
            'data_hora_registro' => 'required|date'
        ]);

        HistoricoPeso::create([
            'id_usuario' => $this->id_usuario,
            'peso' => $this->peso,
            'data_hora_registro' => Carbon::parse($this->data_hora_registro)
        ]);

        session()->flash('message', 'Histórico de peso criado com sucesso!');
        $this->resetInputFields();
    }

    public function edit($id){

        $historico_peso = HistoricoPeso::find($id);

        if($historico_peso){
            $this->id_usuario = $historico_peso->id_usuario;
            $this->peso = $historico_peso->peso;
            $this->data_hora_registro = $historico_peso->data_hora_registro ? $historico_peso->data_hora_registro->format('Y-m-d H:i:s') : null;
            $this->id_hist_peso = $historico_peso->id;
            $this->updateMode = true;
        } else {
            session()->flash('error', 'Histórico de peso não encontrado.');
        }
    }

    public function update(){
        $this->validate([
            'id_usuario' => 'required',
            'peso' => 'required',
            'data_hora_registro' => 'required|date'
        ]);

        $historico_peso = HistoricoPeso::find($this->id);

        if($historico_peso){
            $historico_peso->peso = $this->peso;
            $historico_peso->data_hora_registro = Carbon::parse($this->data_hora_registro);
            $historico_peso->save();

            session()->flash('message', 'Histórico de peso atualizado com sucesso!');
            $this->resetInputFields();
        } else {
            session()->flash('error', 'Histórico de peso não encontrado.');
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
        $this->id_usuario = '';
        $this->peso = '';
        $this->data_hora_registro = '';
        $this->id_hist_peso = null;
        $this->updateMode = false;
    }
}
