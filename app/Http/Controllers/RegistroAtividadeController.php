<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroAtividadeFormRequest;
use App\Models\RegistroAtividade;
use App\Services\RegistroAtividadeServiceInterface;
use Illuminate\Http\Request;

class RegistroAtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $service;
    public function __construct(RegistroAtividadeServiceInterface $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $pesquisar = $request->pesquisar ?? "";
        $perPage = $request->perPage ?? 5;

        $registros =  $this->service->index($pesquisar, $perPage);

        return view('registroatividade.index', [
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
            //
            return view('registroatividade.create');
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $registro = $request->all();
            try{
                $registro = $this->service->show($request, $id);
                return redirect()->route('registroatividade.index')->whit('success', 'Registro cadastrado com sucesso!');
            }catch (Exception $e){
                return view('registroatividade.create', [
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
                return view('registroatividade.show', [
                    'registro'=> $registro['registro'],
                ]);
            }catch (Exception $e){
                return redirect()->route('registroatividade.index')->whit('fail', 'Registro não encontrado!');
            }
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            try{
                $registro = $this->service->show($id);
                return view('registroatividade.edit', [
                    'registro'=> $registro['registro'],
                ]);
            }catch (Exception $e){
                return redirect()->route('registroatividade.index')->whit('fail', 'Registro não encontrado!');
            }
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            $registro = $request->all();
            try{
                $registro = $this->service->show($request, $id);
                return redirect()->route('registroatividade.index')->whit('success', 'Registro atualizado com sucesso!');
            }catch (Exception $e){
                return view('registroatividade.edit', [
                    'registro' => $registro,
                    'fail' => $e->getMessage(),
                ]);
            }
        }

        public function delete($id)
        {
            try{
                $registro = $this->service->show($id);
                return view('registroatividade.destroy', [
                    'registro'=> $registro,
                ]);
            }catch(Exception $e){
                return view('registroatividade.destroy', [
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
                $this->$this->service->destroy($id);
                return redirect()->route('registroatividade.index')->whit('success', 'Registro excluído com sucesso!');
            }catch(Exception $e){
                return redirect()->route('registroatividade.index')->whit('fail', 'Registro não encontrado!');
            }
        }
    }
