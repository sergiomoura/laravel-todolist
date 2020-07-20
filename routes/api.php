<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/tarefas')->middleware(['jwtauth'])->group(
    function () {
        Route::get('','Api\TarefasController@index');
        Route::post('','Api\TarefasController@store');
        Route::put('/{id}','Api\TarefasController@update');
        Route::delete('/{id}','Api\TarefasController@destroy');
        Route::patch('/{id}/feito','Api\TarefasController@setFeito');
        Route::patch('/{id}/desfeito','Api\TarefasController@setDesfeito');
    }
);

Route::post('/auth/login', 'Api\AuthController@login');