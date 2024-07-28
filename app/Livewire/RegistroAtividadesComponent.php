<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RegistroAtividade;
use Illuminate\Support\Facades\Auth;

class RegistroAtividadesComponent extends Component
{

    public $registro_Atividades;
    public $tipo_atividade;
    public $distancia_percorrida;
    public $duracao_atividade;
    public $calorias_queimadas;
    public $data_hora_atividade;
    public $id_reg_atv;
    public $updateMode = false;

    protected $rules = [

        'tipo_atividade' => 'required',
        'distancia_percorrida' => 'required',
        'duracao_atividade' => 'required',
        'calorias_queimadas' => 'required',
        'data_hora_atividade' => 'required|date'
    ];

    public function render()
    {
        if (Auth::check()) {
            $this->registro_Atividades = RegistroAtividade::where('id_usuario', Auth::id())->get();
        } else {
            $this->registro_Atividades = collect(); // Retorna uma coleção vazia se o usuário não estiver autenticado
        }

        return view('livewire.registro-atividades-component');
    }

    public function store(){
        $this->validate();

        $userId = Auth::id();

        if (!$userId) {
            session()->flash('message', 'Erro: Usuário não autenticado.');
            return;
        }

        RegistroAtividade::create([
            'id_usuario' => $userId,
            'tipo_atividade' => $this->tipo_atividade,
            'distancia_percorrida' => $this->distancia_percorrida,
            'duracao_atividade' => $this->duracao_atividade,
            'calorias_queimadas' => $this->calorias_queimadas,
            'data_hora_atividade' => $this->data_hora_atividade
        ]);

        session()->flash('message', 'Registro de atividade criado com sucesso!');
        $this->resetInputFields();
        $this->dispatch('registroAtividadeStore');
        }

    public function edit($id){

        $registroAtividade = RegistroAtividade::find($id);

        if($registroAtividade){
            $this->id_reg_atv = $id;
            $this->tipo_atividade = $registroAtividade->tipo_atividade;
            $this->distancia_percorrida = $registroAtividade->distancia_percorrida;
            $this->duracao_atividade = $registroAtividade->duracao_atividade;
            $this->calorias_queimadas = $registroAtividade->calorias_queimadas;
            $this->data_hora_atividade = $registroAtividade->data_hora_atividade;
            $this->updateMode = true;
        } else {
            session()->flash('error', 'Registro de Atividade não encontrado.');
        }
    }

    public function update(){
        $this->validate();


        if ($this->id_reg_atv) {
            $registroAtividade = RegistroAtividade::find($this->id_reg_atv);
            $registroAtividade->update([
                'tipo_atividade' => $this->tipo_atividade,
                'distancia_percorrida' => $this->distancia_percorrida,
                'duracao_atividade' => $this->duracao_atividade,
                'calorias_queimadas' => $this->calorias_queimadas,
                'data_hora_atividade' => $this->data_hora_atividade,
            ]);

            session()->flash('message', 'Registro de sono atualizado com sucesso.');

            $this->resetInputFields();
            $this->updateMode = false;
        }
    }

    public function delete($id){

        RegistroAtividade::find($id)->delete();
        session()->flash('message', 'Registro de sono deletado com sucesso.');
    }

    private function resetInputFields(){

        $this->tipo_atividade = '';
        $this->distancia_percorrida = '';
        $this->duracao_atividade = '';
        $this->calorias_queimadas = '';
        $this->data_hora_atividade = '';
        $this->id_reg_atv = null;
    }
}
