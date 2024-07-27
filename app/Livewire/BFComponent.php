<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BF;
use Illuminate\Support\Facades\Auth;
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
    public $bfs;
    public $updateMode = false;

    protected $rules = [
        'quantidade_gordura' => 'required|numeric',
        'data_medicao' => 'required|date'
    ];

    public function render()
    {

        if (Auth::check()) {
            $this->bfs = BF::where('id_usuario', Auth::id())->get();
        } else {
            $this->bfs = collect(); // Retorna uma coleção vazia se o usuário não estiver autenticado
        }
        return view('livewire.b-f-component');
    }

    public function store(){
        $this->validate([
            'quantidade_gordura' => 'required|numeric',
            'data_medicao' => 'required|date',
        ]);

        $userId = Auth::id();

        if (!$userId) {
            session()->flash('message', 'Erro: Usuário não autenticado.');
            return;
        }
        BF::create([
            'id_usuario' => $userId,
            'quantidade_gordura' => $this->quantidade_gordura,
            'data_medicao' => $this->data_medicao,
        ]);

        session()->flash('message', 'Medição de gordura criada com sucesso!');
        $this->resetInputFields();
        $this->dispatch('bfStore');
    }

    public function edit($id){

        $bf = BF::findOrFail($id);

        if($bf){
            $this->id_bf = $id;
            $this->quantidade_gordura = $bf->quantidade_gordura;
            //$this->data_medicao = $bf->data_medicao ? $bf->data_medicao->format('Y-m-d-s') : null;
            $this->data_medicao = $bf->data_medicao ? Carbon::createFromFormat('Y-m-d', $this->reminder)->toDateString() : null;
            $this->updateMode = true;
        } else {
            session()->flash('error', 'Medição de gordura não encontrada.');
        }
    }

    public function update(){
        $this->validate();

        if ($this->id_bf) {
            $bf = BF::find($this->id_bf);
            $bf->update([
                'quantidade_gordura' => $this->quantidade_gordura,
                'data_medicao' => $this->data_medicao,
            ]);

            session()->flash('message', 'Medição de gordura atualizada com sucesso!');
            $this->resetInputFields();
        } else {
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
        $this->quantidade_gordura = '';
        $this->data_medicao = '';
        $this->updateMode = false;
    }

}
