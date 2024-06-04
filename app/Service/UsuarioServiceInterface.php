<?php

namespace App\Services;

use App\Models\Usuario;
use Illuminate\Http\Request;


interface UsuarioServiceInterface{

    public function index($pesquisar, $perPage);

    public function create();

    public function store(Request $request);

    public function show(string $id);

    public function edit(string $id);

    public function update(Request $request, string $id);

    public function delete($id);
    
    public function destroy(string $id);
}