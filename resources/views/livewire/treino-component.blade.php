<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($updateMode)
        <h2>Editar Treino</h2>
        @include('livewire.trn.update')
    @else
        <h2>Criar Treino</h2>
        @include('livewire.trn.create')
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nome do treino</th>
                <th>Descrição do treino</th>
            </tr>
        </thead>
        <tbody>
            @foreach($treinos as $treino)
                <tr>
                    <td>{{ $treino->nome_treino }}</td>
                    <td>{{ $treino->descricao }}</td>
                    <td>
                        <button wire:click="edit({{ $treino->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="delete({{ $treino->id }})" class="btn btn-danger">Deletar</button>
                        <button type="submit" href="{{ url('/exercicio') }}" class="nav-link" style="border: none; background: none; padding: 0.65rem 1rem; color: inherit; text-decoration: none;">Registrar Exercício</button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


