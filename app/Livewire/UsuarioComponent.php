<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsuarioComponent extends Component
{
    public $nome;
    public $email;
    public $senha;
    public $data_cadastro;
    public $info_perfil;
    public $usuario_id;
    public $updateMode = false;

    public function render()
    {
        $usuarios = Usuario::all();
        return view('livewire.usuario-component', compact('usuarios'));
    }

    public function store()
    {
        $this->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required',
            'info_perfil' => 'nullable'
        ]);

        Usuario::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => Hash::make($this->senha),
            'data_cadastro' => Carbon::parse($this->data_cadastro = Carbon::now()->toDateTimeString()),
            'info_perfil' => $this->info_perfil,
        ]);

        session()->flash('message', 'Usuário criado com sucesso!');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $usuario = Usuario::find($id);

        if ($usuario) {
            $this->nome = $usuario->nome;
            $this->email = $usuario->email;
            $this->senha = ''; // Senha não deve ser carregada diretamente por segurança
            $this->info_perfil = $usuario->info_perfil;
            $this->usuario_id = $usuario->id;
            $this->updateMode = true;
        } else {
            session()->flash('error', 'Usuário não encontrado.');
        }
    }

    public function update()
    {
        $this->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:usuarios,email,' . $this->usuario_id,
            'senha' => 'nullable',
            'info_perfil' => 'nullable'
        ]);
    
        $usuario = Usuario::find($this->usuario_id);
    
        if ($usuario) {
            $usuario->nome = $this->nome;
            $usuario->email = $this->email;
            if (!empty($this->senha)) {
                $usuario->senha = Hash::make($this->senha);
            }
            // Converter a string da data para um objeto Carbon
            $usuario->info_perfil = $this->info_perfil;
            $usuario->save();
    
            session()->flash('message', 'Usuário atualizado com sucesso!');
            $this->resetInputFields();
        } else {
            session()->flash('error', 'Usuário não encontrado.');
        }
    }

    public function delete($id)
    {
        $usuario = Usuario::find($id);

        if ($usuario) {
            $usuario->delete();
            session()->flash('message', 'Usuário deletado com sucesso!');
        } else {
            session()->flash('error', 'Usuário não encontrado.');
        }
    }

    private function resetInputFields()
    {
        $this->nome = '';
        $this->email = '';
        $this->senha = '';
        $this->info_perfil = '';
        $this->usuario_id = null;
        $this->updateMode = false;
    }
}
