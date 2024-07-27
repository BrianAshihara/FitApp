<form>
    <div class="form-group">
        <label for="tempo_sono">Tempo de Sono</label>
        <input type="number" class="form-control" id="tempo_sono" wire:model="tempo_sono">
        @error('tempo_sono') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="qualidade_sono">Qualidade do Sono</label>
        <input type="number" class="form-control" id="qualidade_sono" wire:model="qualidade_sono">
        @error('qualidade_sono') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="data_registro">Data de Registro</label>
        <input type="date" class="form-control" id="data_registro" wire:model="data_registro">
        @error('data_registro') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <button type="button" wire:click="update()" class="btn btn-primary">Atualizar</button>
    <button type="button" class="btn btn-secondary" wire:click="resetInputFields">Cancelar</button>
    </form>
</div>