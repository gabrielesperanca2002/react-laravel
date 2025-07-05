<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController; // COntrolador

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Aqui vai ser a criação das rotas

Route::get('/usuarios', [UsuarioController::class, 'index']); // Para LISTAR usuários
Route::post('/usuarios', [UsuarioController::class, 'store']); // Para CADASTRAR novo usuário
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']); // Para EXCLUIR um usuário pelo ID