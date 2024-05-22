<?php

namespace App\Services;


interface ServiceInterface {

    public function index($pesquisar, $perPage);

    public function store(Request $request);

    public function show(string $id);

    public function update(Request $request, string $id);
    
    public function destroy(string $id);

}