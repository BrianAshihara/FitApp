<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($updateMode)
        <h2>Editar Registro de Atividade</h2>
        @include('livewire.reg_atv.update')
    @else
        <h2>Criar Registro de Atividade</h2>
        @include('livewire.reg_atv.create')
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Tipo de Atividade</th>
                <th>Distancia Percorrida</th>
                <th>Duração da Atividade</th>
                <th>Calorias Queimadas</th>
                <th>Data da Atividade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reg_atv as $registroAtividade)
                <tr>

                   
                    <td>{{ $registroAtividade->tipo_atividade }}</td>
                    <td>{{ $registroAtividade->distancia_percorrida }}</td>
                    <td>{{ $registroAtividade->duracao_atividade }}</td>
                    <td>{{ $registroAtividade->calorias_queimadas }}</td>
                    <td>{{ $registroAtividade->data_hora_atividade }}</td>
                    <td>
                        <button wire:click="edit({{ $registroAtividade->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="delete({{ $registroAtividade->id }})" class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

