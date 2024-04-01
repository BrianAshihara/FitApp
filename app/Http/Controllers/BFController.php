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
    public function index()
    {
        //dd('acessando o controller autor controller - index');

        //essa variavel service eu criei no construtor e atribui o valor do model
        $registros =  $this->service->index();
        //$registros = Autor::index(10);

        return view('bf.index', [
            'registros'=> $registros['registros'],
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
    public function store(AutorFormRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('bf.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $registro = $this->service->show($id);

        return view('bf.show', [
            'registro' => $registro['registro'],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //complete a função de editar
        $registro = $this->service->show($id);

        return view('bf.edit', [
            'registro'=> $registro['registro'],
        ]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AutorFormRequest $request, string $id)
    {
        //

        //dd('Testeeeeee');
        $this->service->update($request, $id);

        return redirect()->route('bf.index');

    }

    public function delete($id) {
        $registro = $this->service->show($id);
        
        return view('bf.destroy', [
            'registro'=> $registro['registro'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $this->service->destroy($id);
        
        return redirect()->route('bf.index');
        
    }
}
