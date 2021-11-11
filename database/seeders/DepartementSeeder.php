<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("truncate departements");
        $data = [
            ["code_departement"=>"DEP01","lib_departement"=>"BRAZZAVILLE","population_departement"=>"2051565","superficie_departement"=>null],
            ["code_departement"=>"DEP02","lib_departement"=>"POINTE-NOIRE","population_departement"=>"1264637","superficie_departement"=>null],
            ["code_departement"=>"DEP03","lib_departement"=>"NIARI","population_departement"=>"349856","superficie_departement"=>null],
            ["code_departement"=>"DEP04","lib_departement"=>"LEKOUMOU","population_departement"=>"145850","superficie_departement"=>null],
        ];

        foreach($data as $d){
            Departement::create($d);
        }
    }
}
