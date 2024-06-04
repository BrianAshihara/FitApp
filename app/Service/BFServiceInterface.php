<?php

namespace App\Services;

use App\Models\BF;
use Illuminate\Http\Request;


interface BFServiceInterface extends BFServiceInterface {
    public function index($pesquisar, $perPagegi);

    public function create();

    public function store(Request $request);

    public function show(string $id);

    public function edit(string $id);

    public function update(Request $request, string $id);

    public function delete($id);
    
    public function destroy(string $id);
}