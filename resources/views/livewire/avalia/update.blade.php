<div>
    <form>
    <div class="form-group">
        <label for="comentarios">Tipo da Refeição (café da manhã, almoço, café da tarde, janta, ceia e pré ou pós treino):</label>
        <input type="text" class="form-control" id="comentarios" wire:model="comentarios">
        @error('comentarios') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="classificacao">Alimentos Consumidos:</label>
        <input type="text" class="form-control" id="classificacao" wire:model="classificacao">
        @error('classificacao') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="data_avaliacao">Quantidade Calórica da Refeição (em kcal):</label>
        <input type="text" class="form-control" id="data_avaliacao" wire:model="data_avaliacao">
        @error('data_avaliacao') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

        <button type="button" wire:click="update()" class="btn btn-primary">Atualizar</button>
        <button type="button" class="btn btn-secondary" wire:click="resetInputFields">Cancelar</button>
    </form>
</div>