<form wire:submit.prevent="store">
    <div class="form-group">
        <label for="id_usuario">Usuario:</label>
        <input type="text" class="form-control" id="id_usuario" wire:model="id_usuario">
        @error('id_usuario') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="quantidade_gordura">Quantidade de Gordura Corporal (em %):</label>
        <input type="text" class="form-control" id="quantidade_gordura" wire:model="quantidade_gordura">
        @error('quantidade_gordura') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="data_medicao">Data da Medição:</label>
        <input type="date" class="form-control" id="data_medicao" wire:model="data_medicao">
        @error('data_medicao') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
<button type="submit" class="btn btn-success">Salvar</button>
</form>