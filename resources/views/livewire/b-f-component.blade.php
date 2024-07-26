<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($updateMode)
        <h2>Editar Histórico de Porcentagem de Gordura Corporal</h2>
        @include('livewire.b_f.update')
    @else
        <h2>Criar Histórico Porcentagem de Gordura Corporal</h2>
        @include('livewire.b_f.create')
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Quantidade de Gordura Corporal</th>
                <th>Data da Medição</th>
            </tr>
        </thead>
        <tbody>
            @foreach($b_f as $bf)
                <tr>
                    <td>{{ $bf->quantidade_gordura }}</td>
                    <td>{{ $bf->data_medicao }}</td>
                    <td>
                        <button wire:click="edit({{ $bf->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="delete({{ $bf->id }})" class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
