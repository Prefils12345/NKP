<?php

namespace Database\Seeders;

use App\Models\Canal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CanalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("truncate canals");
        $data = [
            ["nom"=>"Web"],
            ["nom"=>"Mob"],
            ["nom"=>"Tab"]
        ];

        foreach($data as $d){
            Canal::create($d);
        }   
    }
}
