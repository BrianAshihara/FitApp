<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($updateMode)
        <h2>Editar Refeição</h2>
        @include('livewire.alm.update')
    @else
        <h2>Criar Refeição</h2>
        @include('livewire.alm.create')
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Tipo de Refeição</th>
                <th>Alimentos Consumidos</th>
                <th>Quantidade Calórica (em kcal)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alimentacoes as $alimentacao)
                <tr>
                    <td>{{ $alimentacao->tipo_refeicao }}</td>
                    <td>{{ $alimentacao->alimentos_consumidos }}</td>
                    <td>{{ $alimentacao->quantidade_calorica }}</td>
                    <td>
                        <button wire:click="edit({{ $alimentacao->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="delete({{ $alimentacao->id }})" class="btn btn-danger">Deletar</button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

