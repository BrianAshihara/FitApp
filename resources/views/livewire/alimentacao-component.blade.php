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
                <th>Usuario</th>
                <th>Tipo de Refeição</th>
                <th>Alimentos Consumidos</th>
                <th>Quantidade Calórica (em kcal)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alm as $alimentacao)
                <tr>
                    <td>{{ $alimentacao->usuario }}</td> <!-- Supondo que você tenha um campo 'usuario' para mostrar -->
                    <td>{{ $alimentacao->tipo_refeicao }}</td>
                    <td>{{ $alimentacao->alimentos_consumidos }}</td>
                    <td>{{ $alimentacao->quantidade_calorica }}</td>
                    <td>
                        <button wire:click="edit({{ $alimentacao->id }})" class="btn btn-primary">Editar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

