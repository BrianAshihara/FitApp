<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($updateMode)
        <h2>Editar Exercicio</h2>
        @include('livewire.exercicio.update')
    @else
        <h2>Criar Exercicio</h2>
        @include('livewire.exercicio.create')
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nome do Exercicio</th>
                <th>Descrição</th>
                <th>Grupo Muscular</th>
                <th>Dificuldade</th>
                <th>Instruções</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exercicios as $exercicio)
                <tr>
                    <td>{{ $exercicio->nome_exercicio }}</td>
                    <td>{{ $exercicio->descricao }}</td>
                    <td>{{ $exercicio->grupo_muscular }}</td>
                    <td>{{ $exercicio->dificuldade }}</td>
                    <td>{{ $exercicio->instrucoes }}</td>
                    <td>
                        <button wire:click="edit({{ $exercicio->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="delete({{ $exercicio->id }})" class="btn btn-danger">Deletar</button>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>