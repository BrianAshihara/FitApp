<?php

namespace App\Http\Controllers;

use App\Http\Requests\BFFormRequest;
use App\Models\Autor;
use App\Services\BFServiceInterface;
use Illuminate\Http\Request;

class BFController extends Controller
{
    // faça a injeção de dependência do context
    private $service;
    public function __construct(BFServiceInterface $service)
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

        $registros =  $this->service->index($pesquisar, $perPage);

        return view('bf.index', [
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
        return view('bf.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BFFormRequest $request)
    {
        $registro = $request->all();
        try{
            $registro = $this->service->show($request, $id);
            return redirect()->route('bf.index')->whit('success', 'Registro cadastrado com sucesso!');
        }catch (Exception $e){
            return view('bf.create', [
                'registro' => $registro,
                'fail' => $e->getMessage(),
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
        return view('bf.show', [
            'registro'=> $registro['registro'],
        ]);
        }catch(Exception $e){
            return view('bf.show', [
                'registro'=> $registro,
                'fail'=> $e->getMessage(),
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
            return view('bf.edit', [
                'registro'=> $registro['registro'],
            ]);
        }catch(Exception $e){
            return view('bf.edit', [
                'registro'=> $registro,
                'fail'=> $e->getMessage(),
            ]);
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BFFormRequest $request, string $id)
    {
        $registro = $request->all();
        try{
            $this->$this->service->show($registro, $id);
            return redirect()->route('bf.index')->whit('success', 'Registro alterado com sucesso!');
        }catch (Exception $e){
            return view('bf.edit', [
                'registro' => $registro,
                'fail' => $e->getMessage(),
            ]);
        }

    }

    public function delete($id) {
        try{
            $registro = $this->service->show($id);
            return view('bf.destroy', [
                'registro'=> $registro,
            ]);
        }catch(Exception $e){
            return view('bf.destroy', [
                'registro'=> $registro,
                'fail'=> $e->getMessage(),
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
            return redirect()->route('bf.index')->whit('success', 'Registro excluído com sucesso!');
        }catch(Exception $e){
            return view('bf.destroy', [
                'fail'=> $e->getMessage(),
            ]);
        }
        return redirect()->route('bf.index');
        
    }
}
