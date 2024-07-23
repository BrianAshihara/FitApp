<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($updateMode)
        <h2>Editar Histórico de Peso</h2>
        @include('livewire.hist_peso.update')
    @else
        <h2>Criar Histórico Peso</h2>
        @include('livewire.hist_peso.create')
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Peso</th>
                <th>Data Cadastro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hist_peso as $historico_peso)
                <tr>

                   
                    <td>{{ $historico_peso->peso }}</td>
                    <td>{{ $historico_peso->data_hora_registro }}</td>
                    <td>
                        <button wire:click="edit({{ $historico_peso->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="delete({{ $historico_peso->id }})" class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
