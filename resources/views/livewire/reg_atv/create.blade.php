<form wire:submit.prevent="store">
    <div class="form-group">
        <label for="id_usuario">Usuario:</label>
        <input type="text" class="form-control" id="id_usuario" wire:model="id_usuario">
        @error('id_usuario') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="tipo_atividade">Tipo da atividade:</label>
        <input type="text" class="form-control" id="tipo_atividade" wire:model="tipo_atividade">
        @error('tipo_atividade') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="distancia_percorrida">Distancia percorrida (em metros):</label>
        <input type="text" class="form-control" id="distancia_percorrida" wire:model="distancia_percorrida">
        @error('distancia_percorrida') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="duracao_atividade">Duração da atividade (em horas):</label>
        <input type="text" class="form-control" id="duracao_atividade" wire:model="duracao_atividade">
        @error('duracao_atividade') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="calorias_queimadas">Calorias queimadas (em kcal):</label>
        <input type="text" class="form-control" id="calorias_queimadas" wire:model="calorias_queimadas">
        @error('calorias_queimadas') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="data_hora_atividade">Data da atividade:</label>
        <input type="date" class="form-control" id="data_hora_atividade" wire:model="data_hora_atividade">
        @error('data_hora_atividade') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
<button type="submit" class="btn btn-success">Salvar</button>
</form>