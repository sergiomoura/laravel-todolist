<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nome'=>'Ataúlfo',
            'email'=>"ataulfo@dh.com",
            'password'=>Hash::make('123456')
        ]);

        DB::table('users')->insert([
            'nome'=>'Carla',
            'email'=>"carla@dh.com",
            'password'=>Hash::make('123456')
        ]);
    }
}
