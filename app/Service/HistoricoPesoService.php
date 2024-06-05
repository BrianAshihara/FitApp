<?php

namespace App\Services;

use Exception;

use App\Models\HistoricoPeso;
use App\Services\HistoricoPesoServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;

class HistoricoPesoService implements HistoricoPesoServiceInterface {

    private $repository;
    public function __construct(HistoricoPeso $historicoPeso)
    {
        $this->repository = $historicoPeso;
    }

    public function index($pesquisar, $perPage) {
        $registro = $this->repository->where(function($query) use($pesquisar){
            if($pesquisar){
                $query->where("peso","like","%".$pesquisar."%");
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

        $this->repository->create($request->all());
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

        $historicoPesoCadastrado = $this->repository->find($id);

        DB::beginTransaction();
        try{
            $registro = $historicoPesoCadastrado->update($request);
            DB::comit();
            return $registro;
        }catch(Exception $e){
            DB::rollback();
            return new Exception('Erro na alteração do registro');
        }


    }

    public function delete($id) {}
    
    public function destroy(string $id) {
        $historicoPesoCadastrado = $this->show($id);

        DB::beginTransaction();
        try{
            $registro = $historicoPesoCadastrado->delete;
            DB::comit();
            return $registro;
        }catch(Exception $e){
            DB::rollback();
            return new Exception('Erro na exclusão do registro');
        }

    }

}