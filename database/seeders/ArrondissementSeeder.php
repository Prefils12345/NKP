<?php

namespace Database\Seeders;

use App\Models\Arrondissement;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ArrondissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("set foreign_key_checks=0");
        DB::statement("truncate arrondissements");
        $data = [
            ["code_arrondissement"=>"ARR0N01","lib_arrondissement"=>"FOUNDOU-FOUNDOU","population_arrondissement"=>NULL,"superficie_arrondissement"=>NULL,"communes_id"=>"1","district_sanitaire_id"=>2],
            ["code_arrondissement"=>"ARR0N02","lib_arrondissement"=>"YOULOU-POUNGUI","population_arrondissement"=>NULL,"superficie_arrondissement"=>NULL,"communes_id"=>"1","district_sanitaire_id"=>2],
            ["code_arrondissement"=>"ARR0N03","lib_arrondissement"=>"BOUALI","population_arrondissement"=>NULL,"superficie_arrondissement"=>NULL,"communes_id"=>"2","district_sanitaire_id"=>1],
            ["code_arrondissement"=>"ARR0N04","lib_arrondissement"=>"ITSIBOU","population_arrondissement"=>NULL,"superficie_arrondissement"=>NULL,"communes_id"=>"2","district_sanitaire_id"=>1],
            ["code_arrondissement"=>"ARR0N04","lib_arrondissement"=>"SIBITI","population_arrondissement"=>"70535","superficie_arrondissement"=>NULL,"communes_id"=>"3","district_sanitaire_id"=>1],
        ];

        foreach($data as $d){
            Arrondissement::create($d);
        }
    }
}
