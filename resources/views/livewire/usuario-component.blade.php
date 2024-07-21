<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($updateMode)
        <h2>Editar Usuário</h2>
        @include('livewire.usuarios.update')
    @else
        <h2>Criar Usuário</h2>
        @include('livewire.usuarios.create')
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Data Cadastro</th>
                <th>Info Perfil</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->data_cadastro }}</td>
                    <td>{{ $usuario->info_perfil }}</td>
                    <td>
                        <button wire:click="edit({{ $usuario->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="delete({{ $usuario->id }})" class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
