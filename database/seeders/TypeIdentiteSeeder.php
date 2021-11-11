<?php

namespace Database\Seeders;

use App\Models\TypeIdentite;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeIdentiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::statement("truncate type_identites");
        $data = [
            ["code_type_piece_identite"=>"TYPIECE01","lib_type_piece_identite"=>"Passport","lib_court_type_piece_identite"=>"PSPRT"],
            ["code_type_piece_identite"=>"TYPIECE02","lib_type_piece_identite"=>"Carte nationale d'identité","lib_court_type_piece_identite"=>"CNI"],
            ["code_type_piece_identite"=>"TYPIECE03","lib_type_piece_identite"=>"Carte consulaire","lib_court_type_piece_identite"=>"CC"],
            ["code_type_piece_identite"=>"TYPIECE04","lib_type_piece_identite"=>"Carte de séjour","lib_court_type_piece_identite"=>"CS"],
            ["code_type_piece_identite"=>"TYPIECE05","lib_type_piece_identite"=>"Carte scolaire","lib_court_type_piece_identite"=>"CSC"],
            ["code_type_piece_identite"=>"TYPIECE06","lib_type_piece_identite"=>"Carte d'étudiant","lib_court_type_piece_identite"=>"CEL"],
            ["code_type_piece_identite"=>"TYPIECE07","lib_type_piece_identite"=>"Permis de conduire","lib_court_type_piece_identite"=>"PDC"],
        ];

        foreach($data as $d){
            TypeIdentite::create($d);
        }
    }
}
