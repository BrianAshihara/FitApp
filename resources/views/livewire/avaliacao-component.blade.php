<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($updateMode)
        <h2>Editar Avaliação</h2>
        @include('livewire.avalia.update')
    @else
        <h2>Criar Avaliação</h2>
        @include('livewire.avalia.create')
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Comentários</th>
                <th>Classificação</th>
                <th>Data Avaliação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($avaliacoes as $avaliacao)
                <tr>
                    <td>{{ $avaliacao->omentarios }}</td>
                    <td>{{ $avaliacao->classificacao }}</td>
                    <td>{{ $avaliacao->data_avaliacao }}</td>
                    <td>
                        <button wire:click="edit({{ $avaliacao->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="delete({{ $avaliacao->id }})" class="btn btn-danger">Deletar</button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

