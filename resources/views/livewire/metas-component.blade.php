<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($updateMode)
        <h2>Editar Meta</h2>
        @include('livewire.metas.update')
    @else
        <h2>Criar Meta</h2>
        @include('livewire.metas.create')
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Tipo de Meta</th>
                <th>Valor da Meta</th>
                <th>Prazo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($metass as $metas)
                <tr>
                    <td>{{ $metas->tipo_meta }}</td>
                    <td>{{ $metas->valor_meta }}</td>
                    <td>{{ $metas->prazo_meta }}</td>
                    <td>
                        <button wire:click="edit({{ $metas->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="delete({{ $metas->id }})" class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
