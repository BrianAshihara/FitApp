<?php

//deve inserir a referencia aqui para conseguir usar o controller
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', [Dashboard::class,'dashboard'])->name('dashboard');

//Chamando rota para usar o controller.
//Listar geral

Route::prefix('usuario')->group(function () {

    Route::any('/index',[UsuarioController::class,'index'])->name('usuario.index');
    Route::get('/create',[UsuarioController::class,'create'])->name('usuario.create');
    Route::get('/edit/{id}',[UsuarioController::class,'edit'])->name('usuario.edit');
    Route::get('/destroy/{id}',[UsuarioController::class,'destroy'])->name('usuario.destroy');
    Route::get('/show/{id}',[UsuarioController::class,'show'])->name('usuario.show');
    Route::get('/delete/{id}',[UsuarioController::class,'delete'])->name('usuario.delete');

    
    Route::post('/store',[AutorController::class,'store'])->name('autor.store');
    Route::delete('/destroy/{id}',[AutorController::class,'destroy'])->name('autor.destroy');
    


    Route::put('/update/{id}',[AutorController::class,'update'])->name('autor.update');
});