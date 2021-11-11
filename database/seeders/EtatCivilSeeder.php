<?php

namespace Database\Seeders;

use App\Models\EtatCivil;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtatCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["etat_civil"=>"Célibataire"],
            ["etat_civil"=>"Marié(e)"],
            ["etat_civil"=>"Divorcé(e)"],
            ["etat_civil"=>"Veuf(-ve)"]
        ];

        DB::statement("TRUNCATE etat_civils");

        foreach($data as $d){
            EtatCivil::create($d);
        }
    }
}
