<div>
    <form wire:submit.prevent="update">
    <div class="form-group">
        <label for="id_usuario">Usuario:</label>
        <input type="text" class="form-control" id="id_usuario" wire:model="id_usuario">
        @error('id_usuario') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
        <div class="form-group">
            <label for="tipo_meta">Tipo de meta:</label>
            <input type="text" class="form-control" id="tipo_meta" wire:model="tipo_meta">
            @error('tipo_meta') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="valor_meta">Valor da meta:</label>
            <input type="text" class="form-control" id="valor_meta" wire:model="valor_meta">
            @error('valor_meta') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="prazo_meta">Prazo da meta:</label>
            <input type="date" class="form-control" id="prazo_meta" wire:model="prazo_meta">
            @error('prazo_meta') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
        <button type="button" class="btn btn-secondary" wire:click="resetInputFields">Cancelar</button>
    </form>
</div>