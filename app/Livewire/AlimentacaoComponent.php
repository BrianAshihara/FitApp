<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Alimentacao;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AlimentacaoComponent extends Component
{

    public $id_usuario;
    public $tipo_refeicao;
    public $alimentos_consumidos;
    public $quantidade_calorica;
    public $id_alm;
    public $updateMode = false;

    public function render()
    {

        $alimentacoes = Alimentacao::where('id_usuario', $this->id_usuario)->get();
        $alm = Alimentacao::all();

        return view('livewire.alimentacao-component', compact ('alm'));
    }

    public function store(){
        $this->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'tipo_refeicao' => 'required',
            'alimentos_consumidos' => 'required',
            'quantidade_calorica' => 'required|numeric',
        ]);

            Alimentacao::create([
            'id_usuario' => $this->id_usuario,
            'tipo_refeicao' => $this->tipo_refeicao,
            'alimentos_consumidos' => $this->alimentos_consumidos,
            'quantidade_calorica' => $this->quantidade_calorica,
        ]);

        session()->flash('message', 'Refeição registrada criado com sucesso!');
        $this->resetInputFields();
    }

    public function edit($id){

        $alimentacao = Alimentacao::find($id);

        if($alimentacao){
            $this->id_usuario = $alimentacao->id_usuario;
            $this->tipo_refeicao = $alimentacao->tipo_refeicao;
            $this->alimentos_consumidos = $alimentacao->alimentos_consumidos;
            $this->quantidade_calorica = $alimentacao->quantidade_calorica;
            $this->id_alm = $alimentacao->id;
            $this->updateMode = true;
        } else {
            session()->flash('error', 'Refeição não encontrada.');
        }
    }

    public function update(){
        $this->validate([
            'id_usuario' => 'required',
            'tipo_refeicao' => 'required',
            'alimentos_consumidos' => 'required',
            'quantidade_calorica' => 'required',	
        ]);

        $alimentacao = Alimentacao::find($this->id);

        if($alimentacao){
            $alimentacao->tipo_refeicao = $this->tipo_refeicao;
            $alimentacao->alimentos_consumidos = $this->alimentos_consumidos;
            $alimentacao->quantidade_calorica = $this->quantidade_calorica;
            $alimentacao->save();

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
        $this->id_usuario = '';
        $this->tipo_refeicao = '';
        $this->alimentos_consumidos = '';
        $this->quantidade_calorica = '';
        $this->id_alm = null;
        $this->updateMode = false;
    }
}
