<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array([ 
            'nombre'=>'Deportivos', 
            'created_at'=>Carbon::now() 
            ],[ 
            'nombre'=> 'Casuales', 
            'created_at'=>Carbon::now() 
            ], [
            'nombre'=> 'Zapatillas', 
            'created_at'=>Carbon::now() 
            ],[
            'nombre'=> 'Mocasines', 
            'created_at'=>Carbon::now() 
            ],[
            'nombre'=> 'Bailarinas', 
            'created_at'=>Carbon::now() 
            ],[
            'nombre'=> 'Sandalias', 
            'created_at'=>Carbon::now() 
            ],[ 
            'nombre'=>'Tacones', 
            'created_at'=>Carbon::now() 
            ]);
            DB::table('categorias')->insert($data);
        
    }
}
