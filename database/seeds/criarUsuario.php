<?php

use Illuminate\Database\Seeder;

class criarUsuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('usuarios')->insert(['usuario'=>'admin','senha'=>'admin']);
    }
}
