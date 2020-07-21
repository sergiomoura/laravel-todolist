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

// Route::prefix('/tarefas')->middleware('jwtauth')->group(
//     function () {
//         Route::get('','Api\TarefasController@index');
//         Route::post('','Api\TarefasController@store');
//         Route::put('/{id}','Api\TarefasController@update');
//         Route::delete('/{id}','Api\TarefasController@destroy');
//         Route::patch('/{id}/feito','Api\TarefasController@setFeito');
//         Route::patch('/{id}/desfeito','Api\TarefasController@setDesfeito');
//     }
// );

Route::get('/tarefas','Api\TarefasController@index')->middleware('jwtauth');
Route::post('/tarefas','Api\TarefasController@store')->middleware('jwtauth');
Route::put('/tarefas/{id}','Api\TarefasController@update')->middleware('jwtauth');
Route::delete('/tarefas/{id}','Api\TarefasController@destroy')->middleware('jwtauth');
Route::patch('/tarefas/{id}/feito','Api\TarefasController@setFeito')->middleware('jwtauth');
Route::patch('/tarefas/{id}/desfeito','Api\TarefasController@setDesfeito')->middleware('jwtauth');


Route::post('/auth/login', 'Api\AuthController@login');