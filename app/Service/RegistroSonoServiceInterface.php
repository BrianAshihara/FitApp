<?php

namespace App\Services;

use App\Models\RegistroSono;
use Illuminate\Http\Request;


interface RegistroSonoServiceInterface{

    public function index($pesquisar, $perPage);

    public function create();

    public function store(Request $request);

    public function show(string $id);

    public function edit(string $id);

    public function update(Request $request, string $id);

    public function delete($id);
    
    public function destroy(string $id);
}