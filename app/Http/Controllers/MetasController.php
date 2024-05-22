<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Requests\MetasFormRequest;
use App\Models\Autor;
use App\Services\MetasServiceInterface;
use Illuminate\Http\Request;


class MetasController extends Controller
{
    // faça a injeção de dependência do context
    private $service;
    public function __construct(AutorServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar ?? "";
        $perPage = $request->perPage ?? 5;

        //dd($request->all());

        //essa variavel service eu criei no construtor e atribui o valor do model
        $registros =  $this->service->index($pesquisar, $perPage);
        //$registros = Autor::index(10);

        return view('autor.index', [
            'registros'=> $registros,
            'perPage'=>$perPage,
            'filter'=>$pesquisar,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd('acessando controller - create');
        return view('metas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MetasFormRequest $request, $id)
    {

        $registro = $request->all();
        try{
            $registro = $this->service->show($request, $id);
         return redirect()->route('metas.index')->whit('success', 'Registro cadastrado com sucesso!');
        }catch(Exception $e){
            return view('metas.create', [   
                'registro'=>$registro,
                'fail'=>$e->getMessage(),
            ]);
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        try{
            $registro = $this->service->show($id);
            return view('metas.show', [
                'registro' => $registro['registro'],
            ]);
        }catch(Exception $e){
            return view('metas.show', [   
                'registro'=>$registro,
                'fail'=>$e->getMessage(),
            ]);
        }


        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $registro = $this->service->show($id);
            return view('metas.edit', [
                'registro' => $registro['registro'],
            ]);
        }catch(Exception $e){
            return view('metas.edit', [   
                'registro'=>$registro,
                'fail'=>$e->getMessage(),
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MetasFormRequest $request, string $id)
    {
        $registro = $request->all();
        try{
            $this->$this->service->show($registro, $id);
         return redirect()->route('metas.index')->whit('success', 'Registro alterado com sucesso!');
        }catch(Exception $e){
            return view('metas.edit', [   
                'registro'=>$registro,
                'fail'=>$e->getMessage(),
            ]);
        }

    }

    public function delete($id) {
        try{
            $registro = $this->service->show($id);
            return view('metas.destroy', [
                'registro' => $registro,
            ]);
        }catch(Exception $e){
            return view('metas.destroy', [   
                'registro'=>$registro,
                'fail'=>$e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try{
            $this->service->destroy($id);
            return redirect()->route('metas.index')->whit('success', 'Registro alterado com sucesso!');
        }catch(Exception $e){
            return view('metas.destroy', [   
                'fail'=>$e->getMessage(),
            ]);
        }
        
        return redirect()->route('metas.index');
        
    }
}
