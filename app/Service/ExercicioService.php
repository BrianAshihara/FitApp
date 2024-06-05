<?php

namespace App\Services;

use App\Models\UsuarBFio;
use App\Services\BFServiceInterface;
use Illuminate\Http\Request;

class BFService implements BFServiceInterface {

    private $repository;
    public function __construct(BF $bf)
    {
        $this->repository = $usuario;
    }

    public function index($pesquisar, $perPage) {
        $registro = $this->repository->where(function($query) use($pesquisar){
            if($pesquisar){
                $query->where("nome_exercicio","like","%".$pesquisar."%");
            }
        })->paginate($perPage);
        return $registro;
    }
    

    public function create() {

    }

    public function store(Request $request) {

        DB::beginTransaction();
        try{
            $registro = $this->repository->create($request);
            DB::comit();
            return $registro;
        }catch(Exception $e){
            DB::rollback();
            return new Exception('Erro ao criar o registro');
        }
    }

    public function show(string $id) {
        try{
        $registro = $this->repository->find($id);
        return $registro;
        }catch(ModelNotFoundException $e){
            throw new Exception('Registro não localizado');
        }
        
    }

    public function edit(string $id) {

    }

    public function update(Request $request, string $id) {

        $exercicioCadatrado = $this->repository->find($id);

        DB::beginTransaction();
        try{
            $registro = $exercicioCadatrado->update($request);
            DB::comit();
            return $registro;

        }catch(Exception $e){
            DB::rollback();
            return new Exception('Erro ao atualizar o registro');
        }
    }

    public function delete($id) {}
    
    public function destroy(string $id) {
        $exercicioCadatrado = $this->show($id);

        DB::beginTransaction();
        try{
            $registro = $exercicioCadatrado->delete();
            DB::comit();
            return $registro;
        }catch(Exception $e){
            DB::rollback();
            return new Exception('Erro ao deletar o registro');
        }
    }

}