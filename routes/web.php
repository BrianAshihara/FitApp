<?php

//deve inserir a referencia aqui para conseguir usar o controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

Route::get('/registroSono', function (){
    return view('registroSono');
});

Route::get('/metas', function (){
    return view('metas');
});

//Route::get('/usuario', function (){
//    return view('dashboard');
//});

Route::get('/historicoPeso', function (){
    return view('historicoPeso');
});
Route::get('/avaliacao ', function (){
    return view('avaliacao');
});

Route::get('/registroAtividades', function (){
    return view('registroAtividades');
});

Route::get('/alimentacao', function (){
    return view('alimentacao');
});

Route::get('/treino', function (){
    return view('treino');
});

Route::get('/bf', function (){
    return view('bf');
});

Route::get('/exercicio', function (){
    return view('exercicio');
});

});

Route::get('/cadastro', function (){
    return view('Vsf_Brian');
});

Route::get('/home', [HomeController::class,'home']);

//Chamando rota para usar o controller.
//Listar geral

Route::prefix('usuario')->group(function () {
    Route::any('/index',[UsuarioController::class,'index'])->name('usuario.index');
    Route::get('/create',[UsuarioController::class,'create'])->name('usuario.create');
    Route::get('/edit/{id}',[UsuarioController::class,'edit'])->name('usuario.edit');
    Route::get('/destroy/{id}',[UsuarioController::class,'destroy'])->name('usuario.destroy');
    Route::get('/show/{id}',[UsuarioController::class,'show'])->name('usuario.show');
    Route::get('/delete/{id}',[UsuarioController::class,'delete'])->name('usuario.delete');
});

Route::prefix('registroatividades')->group(function () {
    Route::any('/index',[RegistroAtividadeController::class,'index'])->name('registroatividades.index');
    Route::get('/create',[RegistroAtividadeController::class,'create'])->name('registroatividades.create');
    Route::get('/edit/{id}',[RegistroAtividadeController::class,'edit'])->name('registroatividades.edit');
    Route::get('/destroy/{id}',[RegistroAtividadeController::class,'destroy'])->name('registroatividades.destroy');
    Route::get('/show/{id}',[RegistroAtividadeController::class,'show'])->name('registroatividades.show');
    Route::get('/delete/{id}',[RegistroAtividadeController::class,'delete'])->name('registroatividades.delete');
});

Route::prefix('alimentacao')->group(function () {
    Route::any('/index',[AlimentacaoController::class,'index'])->name('alimentacao.index');
    Route::get('/create',[AlimentacaoController::class,'create'])->name('alimentacao.create');
    Route::get('/edit/{id}',[AlimentacaoController::class,'edit'])->name('alimentacao.edit');
    Route::get('/destroy/{id}',[AlimentacaoController::class,'destroy'])->name('alimentacao.destroy');
    Route::get('/show/{id}',[AlimentacaoController::class,'show'])->name('alimentacao.show');
    Route::get('/delete/{id}',[AlimentacaoController::class,'delete'])->name('alimentacao.delete');
});

Route::prefix('avaliacao')->group(function () {
    Route::any('/index',[AvaliacaoController::class,'index'])->name('avaliacao.index');
    Route::get('/create',[AvaliacaoController::class,'create'])->name('avaliacao.create');
    Route::get('/edit/{id}',[AvaliacaoController::class,'edit'])->name('avaliacao.edit');
    Route::get('/destroy/{id}',[AvaliacaoController::class,'destroy'])->name('avaliacao.destroy');
    Route::get('/show/{id}',[AvaliacaoController::class,'show'])->name('avaliacao.show');
    Route::get('/delete/{id}',[AvaliacaoController::class,'delete'])->name('avaliacao.delete');
});

Route::prefix('bf')->group(function () {
    Route::any('/index',[BfController::class,'index'])->name('bf.index');
    Route::get('/create',[BfController::class,'create'])->name('bf.create');
    Route::get('/edit/{id}',[BfController::class,'edit'])->name('bf.edit');
    Route::get('/destroy/{id}',[BfController::class,'destroy'])->name('bf.destroy');
    Route::get('/show/{id}',[BfController::class,'show'])->name('bf.show');
    Route::get('/delete/{id}',[BfController::class,'delete'])->name('bf.delete');
});

Route::prefix('historicopeso')->group(function () {
    Route::any('/index',[HistoricopesoController::class,'index'])->name('historicopeso.index');
    Route::get('/create',[HistoricopesoController::class,'create'])->name('historicopeso.create');
    Route::get('/edit/{id}',[HistoricopesoController::class,'edit'])->name('historicopeso.edit');
    Route::get('/destroy/{id}',[HistoricopesoController::class,'destroy'])->name('historicopeso.destroy');
    Route::get('/show/{id}',[HistoricopesoController::class,'show'])->name('historicopeso.show');
    Route::get('/delete/{id}',[HistoricopesoController::class,'delete'])->name('historicopeso.delete');
});

Route::prefix('metas')->group(function () {
    Route::any('/index',[MetasController::class,'index'])->name('metas.index');
    Route::get('/create',[MetasController::class,'create'])->name('metas.create');
    Route::get('/edit/{id}',[MetasController::class,'edit'])->name('metas.edit');
    Route::get('/destroy/{id}',[MetasController::class,'destroy'])->name('metas.destroy');
    Route::get('/show/{id}',[MetasController::class,'show'])->name('metas.show');
    Route::get('/delete/{id}',[MetasController::class,'delete'])->name('metas.delete');
});

Route::prefix('registrosono')->group(function () {
    Route::any('/index',[RegistrosonoController::class,'index'])->name('registrosono.index');
    Route::get('/create',[RegistrosonoController::class,'create'])->name('registrosono.create');
    Route::get('/edit/{id}',[RegistrosonoController::class,'edit'])->name('registrosono.edit');
    Route::get('/destroy/{id}',[RegistrosonoController::class,'destroy'])->name('registrosono.destroy');
    Route::get('/show/{id}',[RegistrosonoController::class,'show'])->name('registrosono.show');
    Route::get('/delete/{id}',[RegistrosonoController::class,'delete'])->name('registrosono.delete');
});
