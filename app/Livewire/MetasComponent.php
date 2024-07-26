<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Metas;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;


class MetasComponent extends Component
{
    public $metas;
    public $tipo_meta;
    public $valor_meta;
    public $prazo_meta;
    public $meta_id;
    public $updateMode = false;

    protected $rules = [
        'tipo_meta' => 'required|string',
        'valor_meta' => 'required|string',
        'prazo_meta' => 'required|date',
    ];

    public function render()
    {
        $this->metas = Metas::where('id_usuario', Auth::id())->get();
        return view('livewire.metas-component');
    }

    public function resetInputFields()
    {
        $this->tipo_meta = '';
        $this->valor_meta = '';
        $this->prazo_meta = '';
    }

    public function store()
    {
        $this->validate();

        Metas::create([
            'id_usuario' => Auth::id(),
            'tipo_meta' => $this->tipo_meta,
            'valor_meta' => $this->valor_meta,
            'prazo_meta' => $this->prazo_meta,
        ]);

        session()->flash('message', 'Meta criada com sucesso.');

        $this->resetInputFields();
        $this->emit('metaStore'); // Evento para atualização do front-end
    }

    public function edit($id)
    {
        $record = Metas::findOrFail($id);

        $this->meta_id = $id;
        $this->tipo_meta = $record->tipo_meta;
        $this->valor_meta = $record->valor_meta;
        $this->prazo_meta = $record->prazo_meta->format('Y-m-d');

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