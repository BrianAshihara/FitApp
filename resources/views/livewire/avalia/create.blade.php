<form >
    <div class="form-group">
        <label for="comentarios">Comentários:</label>
        <input type="text" class="form-control" id="comentarios" wire:model="comentarios">
        @error('comentarios') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="classificacao">Classificação (0 a 5):</label>
        <input type="text" class="form-control" id="classificacao" wire:model="classificacao">
        @error('classificacao') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="data_avaliacao">Data Avaliacao:</label>
        <input type="date" class="form-control" id="data_avaliacao" wire:model="data_avaliacao">
        @error('data_avaliacao') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <button type="button" wire:click="store()" class="btn btn-primary">Salvar</button>
</form>