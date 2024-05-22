<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioFormRequest;
use App\Models\Usuario;
use App\Services\UsuarioServiceInterface;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // faça a injeção de dependência do context
    private $service;
    public function __construct(UserServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //dd('acessando o controller autor controller - index');
        $pesquisar = $request->pesquisar ?? "";
        $perPage = $request->perPage ?? 5;
        //essa variavel service eu criei no construtor e atribui o valor do model
        $registros =  $this->service->index($pesquisar, $perPage);
        //$registros = Autor::index(10);

        return view('usuario.index', [
            'registros' => $registros,
            'pesquisar' => $pesquisar,
            'perPage' => $perPage,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd('acessando controller - create');
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AutorFormRequest $request, $id)
    {
        $registro = $request->all();
        try{
            $registro = $this->service->show($request,$id);
        return redirect()->route('usuario.index')->whit('success', 'Registro criado com sucesso');
        }catch (Exception $e){
            return view('usuario.create', [
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
            return view('usuario.show', [
                'registro' => $registro['registro'],
            ]);
        }catch(Execption $e){
            return view('usuario.show', [
                'registro' => $registro,
                'fail' => $e->getMessage(),
            ]);
        }
        


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        //complete a função de editar
        try{
            $registro = $this->service->show($id);
            return view('usuario.edit', [
                'registro' => $registro['registro'],
            ]);
        }catch(Exception $e){
            return view('usuario.edit', [
                'registro' => $registro,
                'fail' => $e->getMessage(),
            ]);
        }
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AutorFormRequest $request, string $id)
    {
        //

        //dd('Testeeeeee');
        $registro = $request->all();
        try{
            $registro = $this->service->show($request,$id);
            return redirect()->route('usuario.index')->whit('success', 'Registro atualizado com sucesso');
        }catch(Exception $e){
            return view('usuario.edit', [
                'registro' => $registro,
                'fail' => $e->getMessage(),
            ]);
        }

    }

    public function delete($id) {

        try{
            $registro = $this->service->show($id);
            return view('usuario.destroy', [
                'registro' => $registro,
            ]);
        }catch(Exception $e){
            return view('usuario.index', [
                'registro' => $registro,
                'fail' => $e->getMessage(),
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
            return redirect()->route('usuario.index')->whit('success', 'Registro excluído com sucesso');
        }catch(Exception $e){
            return view('usuario.destroy', [
                'fail' => $e->getMessage(),
            ]);
        }
        return redirect()->route('usuario.index');
        
    }
}
