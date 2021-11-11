<?php

namespace Database\Seeders;

use App\Models\Commune;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("set foreign_key_checks=0 ");
        DB::statement("truncate communes");
        $data = [
            ["code_commune"=>"COM01","lib_commune"=>"DOLISIE","population_commune"=>"126758","superficie_commune"=>"","departements_id"=>"3"],
            ["code_commune"=>"COM02","lib_commune"=>"MOSSENDJO","population_commune"=>"20025","superficie_commune"=>"","departements_id"=>"3"],
            ["code_commune"=>"COM03","lib_commune"=>"SIBITI","population_commune"=>"70535","superficie_commune"=>"","departements_id"=>"4"],
            ["code_commune"=>"COM04","lib_commune"=>"POINTE-NOIRE","population_commune"=>"1264637","superficie_commune"=>"","departements_id"=>"2"], 
        ];

        foreach($data as $d){
            Commune::create($d);
        }
    }
}
