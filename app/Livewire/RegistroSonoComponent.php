<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RegistroSono;
use Illuminate\Support\Facades\Auth;

class RegistroSonoComponent extends Component
{
    public $registroSonos;
    public $tempo_sono;
    public $qualidade_sono;
    public $data_registro;
    public $registroSono_id;
    public $updateMode = false;

    protected $rules = [
        'tempo_sono' => 'required|integer',
        'qualidade_sono' => 'required|integer',
        'data_registro' => 'required|date',
    ];

    public function render()
    {
        if (Auth::check()) {
            $this->registroSonos = RegistroSono::where('id_usuario', Auth::id())->get();
        } else {
            $this->registroSonos = collect(); // Retorna uma coleção vazia se o usuário não estiver autenticado
        }
        return view('livewire.registro-sono-component');
    }

    public function resetInputFields()
    {
        $this->tempo_sono = '';
        $this->qualidade_sono = '';
        $this->data_registro = '';
    }

    public function store()
    {
        $this->validate();

        $userId = Auth::id();

        if (!$userId) {
            session()->flash('message', 'Erro: Usuário não autenticado.');
            return;
        }

        RegistroSono::create([
            'id_usuario' => $userId,
            'tempo_sono' => $this->tempo_sono,
            'qualidade_sono' => $this->qualidade_sono,
            'data_registro' => $this->data_registro,
        ]);

        session()->flash('message', 'Registro de sono criado com sucesso.');

        $this->resetInputFields();
        $this->dispatch('registroSonoStore'); // Emite um evento para o navegador
    }

    public function edit($id)
    {
        $record = RegistroSono::findOrFail($id);

        $this->registroSono_id = $id;
        $this->tempo_sono = $record->tempo_sono;
        $this->qualidade_sono = $record->qualidade_sono;
        $this->data_registro = $record->data_registro->format('Y-m-d');

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->registroSono_id) {
            $record = RegistroSono::find($this->registroSono_id);
            $record->update([
                'tempo_sono' => $this->tempo_sono,
                'qualidade_sono' => $this->qualidade_sono,
                'data_registro' => $this->data_registro,
            ]);

            session()->flash('message', 'Registro de sono atualizado com sucesso.');

            $this->resetInputFields();
            $this->updateMode = false;
        }
    }

    public function delete($id)
    {
        RegistroSono::find($id)->delete();
        session()->flash('message', 'Registro de sono deletado com sucesso.');
    }
}