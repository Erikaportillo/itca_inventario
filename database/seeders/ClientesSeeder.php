<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array([ 
            'nombre'=>'Melvin', 
            'edad'=>27, 
            'categorias'=> 1, 
            'created_at'=> Carbon::now() 
            ],[
            'nombre'=>'Jose', 
            'edad'=>30, 
            'categorias'=> 2, 
            'created_at'=> Carbon::now()
            ],[
            'nombre'=>'Vanessa', 
            'edad'=>31, 
            'categoria'=> 7, 
            'created_at'=> Carbon::now()
            ],[
            'nombre'=>'Melissa', 
            'edad'=>20, 
            'categoria'=> 6, 
            'created_at'=> Carbon::now()
            ],[
            'nombre'=>'Nahomi', 
            'edad'=>15, 
            'categoria'=> 5, 
            'created_at'=> Carbon::now()
            ],[
            'nombre'=>'Carmen', 
            'edad'=>25, 
            'categoria'=> 3, 
            'created_at'=> Carbon::now()
            ],[ 
            'nombre'=>'Carlos', 
            'edad'=>35, 
            'categorias'=> 4, 
            'created_at'=> Carbon::now() 
            ]); 
            
            DB::table('clientes')->insert($data); 
    }
    
}
