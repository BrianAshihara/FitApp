<div>
    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" wire:model="nome">
            @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" wire:model="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" wire:model="senha">
            @error('senha') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="info_perfil">Informações do Perfil:</label>
            <textarea class="form-control" id="info_perfil" wire:model="info_perfil"></textarea>
            @error('info_perfil') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <input type="hidden" wire:model="usuario_id">
        <button type="submit" class="btn btn-success">Atualizar</button>
        <button type="button" class="btn btn-secondary" wire:click="resetInputFields">Cancelar</button>
    </form>
</div>