<form >
    <div class="form-group">
        <label for="tipo_refeicao">Tipo da Refeição (café da manhã, almoço, café da tarde, janta, ceia e pré ou pós treino):</label>
        <input type="text" class="form-control" id="tipo_refeicao" wire:model="tipo_refeicao">
        @error('tipo_refeicao') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="alimentos_consumidos">Alimentos Consumidos:</label>
        <input type="text" class="form-control" id="alimentos_consumidos" wire:model="alimentos_consumidos">
        @error('alimentos_consumidos') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="quantidade_calorica">Quantidade Calórica da Refeição (em kcal):</label>
        <input type="text" class="form-control" id="quantidade_calorica" wire:model="quantidade_calorica">
        @error('quantidade_calorica') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <button type="button" wire:click="store()" class="btn btn-primary">Salvar</button>
</form>