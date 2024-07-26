<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BF;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BFComponent extends Component
{

    public $id_usuario;
    public $quantidade_gordura;
    public $data_medicao;
    public $id_bf;
    public $updateMode = false;

    public function render()
    {

        $bfs = BF::where('id_usuario', $this->id_usuario)->get();
        $b_f = BF::all();
        return view(('livewire.b-f-component'), compact ('b_f'));
    }

    public function store(){
        $this->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'quantidade_gordura' => 'required|numeric',
            'data_medicao' => 'required|date'
        ]);

        BF::create([
            'id_usuario' => $this->id_usuario,
            'quantidade_gordura' => $this->quantidade_gordura,
            'data_medicao' => Carbon::parse($this->data_medicao)
        ]);

        session()->flash('message', 'Medição de gordura criada com sucesso!');
        $this->resetInputFields();
    }

    public function edit($id){

        $bf = BF::find($id);

        if($bf){
            $this->id_usuario = $bf->id_usuario;
            $this->quantidade_gordura = $bf->quantidade_gordura;
            $this->data_medicao = $bf->data_medicao ? $bf->data_medicao->format('Y-m-d') : null;
            $this->id_bf = $bf->id;
            $this->updateMode = true;
        } else {
            session()->flash('error', 'Medição de gordura não encontrada.');
        }
    }

    public function update(){
        $this->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'quantidade_gordura' => 'required|numeric',
            'data_medicao' => 'required|date'
        ]);

        $bf = BF::find($id);
        if ($id_bf) {

            $bf->peso = $this->quantidade_gordura;
            $bf->data_medicao = Carbon::parse($this->data_hora_registro);
            $bf->save();
            session()->flash('message', 'Medição de gordura atualizada com sucesso!');
            $this->resetInputFields();
        }else{
            session()->flash('error', 'Medição de gordura não encontrada.');
        }
    }

    public function delete($id){

        $bf = BF::find($id);
        if($id){
            $bf->delete();
            session()->flash('message', 'Medição de gordura deletada com sucesso!');
        }else{
            session()->flash('error', 'Medição de gordura não encontrada.');
        }
    }

    private function resetInputFields(){
        $this->id_usuario = '';
        $this->quantidade_gordura = '';
        $this->data_medicao = '';
        $this->id_bf = null;
        $this->updateMode = false;
    }

}
