<form wire:submit.prevent="store">
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
    <button type="button" wire:click="store()" class="btn btn-primary">Salvar</button>
</form>