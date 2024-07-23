<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RegistroAtividade;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistroAtividadesComponent extends Component
{

    public $id_usuario;
    public $tipo_atividade;
    public $distancia_percorrida;
    public $duracao_atividade;
    public $calorias_queimadas;
    public $data_hora_atividade;
    public $id_reg_atv;
    public $updateMode = false;

    public function render()
    {
        $registroAtividades = RegistroAtividade::where('id_usuario', $this->id_usuario)->get();
        $reg_atv = RegistroAtividade::all();

        return view('livewire.registro-atividades-component', compact ('reg_atv'));
    }

    public function store(){
        $this->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'tipo_atividade' => 'required',
            'distancia_percorrida' => 'required|numeric',
            'duracao_atividade' => 'required|numeric',
            'calorias_queimadas' => 'required|numeric',
            'data_hora_atividade' => 'required|date'
        ]);

            RegistroAtividade::create([
            'id_usuario' => $this->id_usuario,
            'tipo_atividade' => $this->tipo_atividade,
            'distancia_percorrida' => $this->distancia_percorrida,
            'duracao_atividade' => $this->duracao_atividade,
            'calorias_queimadas' => $this->calorias_queimadas,
            'data_hora_atividade' => Carbon::parse($this->data_hora_atividade)
        ]);

        session()->flash('message', 'Registro de atividade criado com sucesso!');
        $this->resetInputFields();
    }

    public function edit($id){

        $registroAtividade = RegistroAtividade::find($id);

        if($registroAtividade){
            $this->id_usuario = $registroAtividade->id_usuario;
            $this->tipo_atividade = $registroAtividade->tipo_atividade;
            $this->distancia_percorrida = $registroAtividade->distancia_percorrida;
            $this->duracao_atividade = $registroAtividade->duracao_atividade;
            $this->calorias_queimadas = $registroAtividade->calorias_queimadas;
            $this->id_reg_atv = $registroAtividade->id;
            $this->data_hora_atividade = $registroAtividade->data_hora_atividade ? $registroAtividade->data_hora_atividade->format('Y-m-d H:i:s') : null;
            $this->updateMode = true;
        } else {
            session()->flash('error', 'Registro de Atividade não encontrado.');
        }
    }

    public function update(){
        $this->validate([
            'id_usuario' => 'required',
            'tipo_atividade' => 'required',
            'distancia_percorrida' => 'required',
            'duracao_atividade' => 'required',	
            'calorias_queimadas' => 'required',
            'data_hora_atividade' => 'required|date'
        ]);

        $registroAtividade = RegistroAtividade::find($this->id);

        if($registroAtividade){
            $registroAtividade->tipo_atividade = $this->tipo_atividade;
            $registroAtividade->distancia_percorrida = $this->distancia_percorrida;
            $registroAtividade->duracao_atividade = $this->duracao_atividade;
            $registroAtividade->calorias_queimadas = $this->calorias_queimadas;
            $registroAtividade->data_hora_atividade = Carbon::parse($this->data_hora_atividade);
            $registroAtividade->save();

            session()->flash('message', 'Registro de atividade atualizado com sucesso!');
            $this->resetInputFields();
        } else {
            session()->flash('error', 'Registro de atividade não encontrado.');
        }
    }

    public function delete($id){

        $registroAtividade = RegistroAtividade::find($id);

        if($registroAtividade){
            $registroAtividade->delete();
            session()->flash('message', 'Registro de atividade deletado com sucesso!');
        } else {
            session()->flash('error', 'Registro de atividade não encontrado.');
        }
    }

    private function resetInputFields(){
        $this->id_usuario = '';
        $this->tipo_atividade = '';
        $this->distancia_percorrida = '';
        $this->duracao_atividade = '';
        $this->calorias_queimadas = '';
        $this->data_hora_atividade = '';
        $this->id_reg_atv = null;
        $this->updateMode = false;
    }
}
