<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefasController extends Controller
{
    public function index(){
        return response(auth()->user()->tarefas,200);
    }

    public function store(Request $request){
        auth()->user()->tarefas()->create(
            [
                'descricao' => $request->descricao
            ]
            );
    }

    public function update(Request $request, $id){
        return response()->json(['status'=>'update']);
    }

    public function destroy($id){
        return response()->json(['status'=>'destroy']);
    }
}
