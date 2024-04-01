<?php

namespace App\Services;

use App\Models\RegistroSono;
use App\Services\RegistroSonoServiceInterface;
use Illuminate\Http\Request;

class RegistroSonoService implements RegistroSonoServiceInterface {

    private $repository;
    public function __construct(Autor $autor)
    {
        $this->repository = $autor;
    }

    public function index() {
        $registros = $this->repository->paginate(10);
        return (
            ["registros" => $registros]
        );
    }
    

    public function create() {

    }

    public function store(Request $request) {

        $this->repository->create($request->all());
    }

    public function show(string $id) {
        $registro = $this->repository->find($id);

        return (
            ["registro" => $registro]
        );
    }

    public function edit(string $id) {

    }

    public function update(Request $request, string $id) {

        // $request->validate([
        //     $registro = $request->all()
        // ]);

        $registro = $request->all();   

        $autor = $this->repository->find($id);

        $autor -> update($registro);
    }

    public function delete($id) {}
    
    public function destroy(string $id) {
        $registro = $this->repository->find($id);

        $registro->delete();
    }

}