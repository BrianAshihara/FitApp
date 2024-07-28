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
                <th>Peso</th>
                <th>Data Cadastro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historicoPesos as $historicoPeso)
                <tr>
            
                    <td>{{ $historicoPeso->peso }}</td>
                    <td>{{ $historicoPeso->data_hora_registro }}</td>
                    <td>
                        <button wire:click="edit({{ $historicoPeso->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="delete({{ $historicoPeso->id }})" class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
