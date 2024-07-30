<div>
    <form wire:submit.prevent="update">
    <div class="form-group">
        <label for="exercicio">Nome do Exercicio:</label>
        <input type="text" class="form-control" id="exercicio" wire:model="exercicio">
        @error('exercicio') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input type="text" class="form-control" id="descricao" wire:model="descricao">
        @error('descricao') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="grupo_muscular">Grupo Muscular:</label>
        <input type="text" class="form-control" id="grupo_muscular" wire:model="grupo_muscular">
        @error('grupo_muscular') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="dificuldade">Dificuldade:</label>
        <input type="text" class="form-control" id="dificuldade" wire:model="dificuldade">
        @error('dificuldade') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="instrucoes">Instruções:</label>
        <input type="text" class="form-control" id="instrucoes" wire:model="instrucoes">
        @error('instrucoes') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
        <button type="button" wire:click="update()" class="btn btn-primary">Atualizar</button>
        <button type="button" class="btn btn-secondary" wire:click="resetInputFields">Cancelar</button>
    </form>
</div>