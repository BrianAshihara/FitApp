<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($updateMode)
        <h2>Editar Registro de Sono</h2>
        @include('livewire.reg_sono.update')
    @else
        <h2>Criar Registro de Sono</h2>
        @include('livewire.reg_sono.create')
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Tempo de Sono</th>
                <th>Qualidade do Sono</th>
                <th>Data de Registro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registroSonos as $registroSono)
                <tr>
                    <td>{{ $registroSono->tempo_sono }}</td>
                    <td>{{ $registroSono->qualidade_sono }}</td>
                    <td>{{ $registroSono->data_registro }}</td>
                    <td>
                        <button wire:click="edit({{ $registroSono->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="delete({{ $registroSono->id }})" class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
