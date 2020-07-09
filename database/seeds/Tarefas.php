<?php

use Illuminate\Database\Seeder;

class Tarefas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarefas')->insert([
            'descricao'=>'Pagar conta de luz',
            'user_id'=>1,
            'created_at'=>date('Y-n-d H:i:s')
        ]);
        DB::table('tarefas')->insert([
            'descricao'=>'Pagar IPTU',
            'user_id'=>1,
            'created_at'=>date('Y-n-d H:i:s')
        ]);
        DB::table('tarefas')->insert([
            'descricao'=>'Marcar hora no barbeiro',
            'user_id'=>1,
            'created_at'=>date('Y-n-d H:i:s')
        ]);
        DB::table('tarefas')->insert([
            'descricao'=>'Lavar roupa',
            'user_id'=>2,
            'created_at'=>date('Y-n-d H:i:s')
        ]);
        DB::table('tarefas')->insert([
            'descricao'=>'Pintar cabelo',
            'user_id'=>2,
            'created_at'=>date('Y-n-d H:i:s')
        ]);
        DB::table('tarefas')->insert([
            'descricao'=>'Fazer almoço',
            'user_id'=>2,
            'created_at'=>date('Y-n-d H:i:s')
        ]);
        DB::table('tarefas')->insert([
            'descricao'=>'Marcar consulta no dermato',
            'user_id'=>2,
            'created_at'=>date('Y-n-d H:i:s')
        ]);
    }
}
