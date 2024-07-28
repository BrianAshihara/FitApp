<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Metas;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;


class MetasComponent extends Component
{
    public $metass;
    public $tipo_meta;
    public $valor_meta;
    public $prazo_meta;
    public $meta_id;
    public $updateMode = false;

    protected $rules = [
        'tipo_meta' => 'required',
        'valor_meta' => 'required',
        'prazo_meta' => 'required',
    ];

    public function render()
    {
        if (Auth::check()) {
            $this->metass = Metas::where('id_usuario', Auth::id())->get();
        } else {
            $this->metass = collect(); // Retorna uma coleção vazia se o usuário não estiver autenticado
        }
        
        return view('livewire.metas-component');
    }

    public function resetInputFields()
    {
        $this->tipo_meta = '';
        $this->valor_meta = '';
        $this->prazo_meta = '';
        $this->meta_id = '';
        $this->metass = '';



    }

    public function store()
    {
        $this->validate();

        $userId = Auth::id();

        if (!$userId) {
            session()->flash('message', 'Erro: Usuário não autenticado.');
            return;
        }

        Metas::create([
            'id_usuario' => $userId,
            'tipo_meta' => $this->tipo_meta,
            'valor_meta' => $this->valor_meta,
            'prazo_meta' => $this->prazo_meta,
        ]);

        session()->flash('message', 'Meta criada com sucesso.');

        $this->resetInputFields();
        $this->dispatch('metaStore'); // Evento para atualização do front-end
    }

    public function edit($id)
    {
        $record = Metas::findOrFail($id);

        $this->meta_id = $id;
        $this->tipo_meta = $record->tipo_meta;
        $this->valor_meta = $record->valor_meta;
        $this->prazo_meta = $record->prazo_meta;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->meta_id) {
            $record = Metas::find($this->meta_id);
            $record->update([
                'tipo_meta' => $this->tipo_meta,
                'valor_meta' => $this->valor_meta,
                'prazo_meta' => $this->prazo_meta,
            ]);

            session()->flash('message', 'Meta atualizada com sucesso.');

            $this->resetInputFields();
            $this->updateMode = false;
        }
    }

    public function delete($id)
    {
        Metas::find($id)->delete();
        session()->flash('message', 'Meta deletada com sucesso.');
    }
}