<div>
    <form >
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
        <button type="submit" wire:click="update()" class="btn btn-success">Atualizar</button>
        <button type="button" class="btn btn-secondary" wire:click="resetInputFields">Cancelar</button>
    </form>
</div>