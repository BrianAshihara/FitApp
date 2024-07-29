<form>
<div class="form-group">
        <label for="nome_treino">Nome do treino</label>
        <input type="text" class="form-control" id="nome_treino" wire:model="nome_treino">
        @error('nome_treino') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="descricao">Descrição do treino</label>
        <input type="text" class="form-control" id="descricao" wire:model="descricao">
        @error('descricao') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <button type="button" wire:click="update()" class="btn btn-primary">Atualizar</button>
    <button type="button" class="btn btn-secondary" wire:click="resetInputFields">Cancelar</button>
    </form>
</div>