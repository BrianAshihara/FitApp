<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Usuario;
use Carbon\Carbon;

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
            'data_cadastro' => 'required|date',
            'info_perfil' => 'nullable'
        ]);

        Usuario::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => bcrypt($this->senha),
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
            $this->data_cadastro = $usuario->data_cadastro ? $usuario->data_cadastro->format('Y-m-d') : null; // Converte para string no formato 'Y-m-d'
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
            'data_cadastro' => 'required|date',
            'info_perfil' => 'nullable'
        ]);
    
        $usuario = Usuario::find($this->usuario_id);
    
        if ($usuario) {
            $usuario->nome = $this->nome;
            $usuario->email = $this->email;
            if (!empty($this->senha)) {
                $usuario->senha = bcrypt($this->senha);
            }
            // Converter a string da data para um objeto Carbon
            $usuario->data_cadastro = Carbon::createFromFormat('Y-m-d', $this->data_cadastro);
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
        $this->data_cadastro = '';
        $this->info_perfil = '';
        $this->usuario_id = null;
        $this->updateMode = false;
    }
}
