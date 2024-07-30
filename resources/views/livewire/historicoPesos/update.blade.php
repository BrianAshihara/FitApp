<div>
    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="peso">Peso:</label>
            <input type="text" class="form-control" id="peso" wire:model="peso">
            @error('peso') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="data_hora_registro">Data de Cadastro:</label>
            <input type="date" class="form-control" id="data_hora_registro" wire:model="data_hora_registro">
            @error('data_hora_registro') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <input type="hidden" wire:model="historicoPeso_id">
        <button type="submit" class="btn btn-success">Atualizar</button>
        <button type="submit" class="btn btn-secondary" wire:click="resetInputFields">Cancelar</button>
    </form>
</div>