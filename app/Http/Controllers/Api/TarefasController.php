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
        $tarefa = auth()->user()->tarefas()->create(
            ['descricao' => $request->descricao]
        );
        return response()->json($tarefa);
    }

    public function update(Request $request, $id){
        
        $tarefa = auth()->user()->tarefas()->find($id);
        if($tarefa){
            $tarefa->descricao = $request->descricao;
            $tarefa->save();
            return response()->json($tarefa);
        }

    }

    public function destroy($id){
        $tarefa = auth()->user()->tarefas()->find($id);
        
        if(!$tarefa){
            return response(["error" => "Tarefa não encontrada"],404);
        }

        Tarefa::destroy($tarefa->id);
        return response()->json($tarefa);
    }
}
