<form wire:submit.prevent="store">
    <div class="form-group">
        <label for="id_usuario">Usuario:</label>
        <input type="text" class="form-control" id="id_usuario" wire:model="id_usuario">
        @error('id_usuario') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="peso">Peso:</label>
        <input type="text" class="form-control" id="peso" wire:model="peso">
        @error('peso') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="data_hora_registro">Data de Registro:</label>
        <input type="date" class="form-control" id="data_hora_registro" wire:model="data_hora_registro">
        @error('data_hora_registro') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
<button type="submit" class="btn btn-success">Salvar</button>
</form>