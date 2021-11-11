<?php

namespace Database\Seeders;

use App\Models\Pays;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("set foreign_key_checks=0");
        DB::statement("truncate tr_pays");
        $data = [
            ["code_pays"=>"PAYS01","lib_pays_fr"=>"Afghanistan","lib_pays_eng"=>"Afghanistan","numero_pays"=>"4","code_alpha2"=>"AF","code_alpha3"=>"AFG"],
            ["code_pays"=>"PAYS02","lib_pays_fr"=>"Îles Åland","lib_pays_eng"=>"Åland Islands","numero_pays"=>"248","code_alpha2"=>"AX","code_alpha3"=>"ALA"],
            ["code_pays"=>"PAYS03","lib_pays_fr"=>"Albanie","lib_pays_eng"=>"Albania","numero_pays"=>"8","code_alpha2"=>"AL","code_alpha3"=>"ALB"],
            ["code_pays"=>"PAYS04","lib_pays_fr"=>"Algérie","lib_pays_eng"=>"Algeria","numero_pays"=>"12","code_alpha2"=>"DZ","code_alpha3"=>"DZA"],
            ["code_pays"=>"PAYS05","lib_pays_fr"=>"Samoa américaines","lib_pays_eng"=>"American Samoa","numero_pays"=>"16","code_alpha2"=>"AS","code_alpha3"=>"ASM"],
            ["code_pays"=>"PAYS06","lib_pays_fr"=>"Andorre","lib_pays_eng"=>"Andorra","numero_pays"=>"20","code_alpha2"=>"AD","code_alpha3"=>"AND"],
            ["code_pays"=>"PAYS07","lib_pays_fr"=>"Angola","lib_pays_eng"=>"Angola","numero_pays"=>"24","code_alpha2"=>"AO","code_alpha3"=>"AGO"],
            ["code_pays"=>"PAYS08","lib_pays_fr"=>"Anguilla","lib_pays_eng"=>"Anguilla","numero_pays"=>"660","code_alpha2"=>"AI","code_alpha3"=>"AIA"],
            ["code_pays"=>"PAYS09","lib_pays_fr"=>"Antarctique","lib_pays_eng"=>"Antarctica","numero_pays"=>"10","code_alpha2"=>"AQ","code_alpha3"=>"ATA"],
            ["code_pays"=>"PAYS10","lib_pays_fr"=>"Antigua-et-Barbuda","lib_pays_eng"=>"Antigua-and-Barbuda","numero_pays"=>"28","code_alpha2"=>"AG","code_alpha3"=>"ATG"],
            ["code_pays"=>"PAYS11","lib_pays_fr"=>"Argentine","lib_pays_eng"=>"Argentina","numero_pays"=>"32","code_alpha2"=>"AR","code_alpha3"=>"ARG"],
            ["code_pays"=>"PAYS12","lib_pays_fr"=>"Arménie","lib_pays_eng"=>"Armenia","numero_pays"=>"51","code_alpha2"=>"AM","code_alpha3"=>"ARM"],
            ["code_pays"=>"PAYS13","lib_pays_fr"=>"Aruba","lib_pays_eng"=>"Aruba","numero_pays"=>"533","code_alpha2"=>"AW","code_alpha3"=>"ABW"],
            ["code_pays"=>"PAYS14","lib_pays_fr"=>"Australie","lib_pays_eng"=>"Australia","numero_pays"=>"36","code_alpha2"=>"AU","code_alpha3"=>"AUS"],
            ["code_pays"=>"PAYS15","lib_pays_fr"=>"Autriche","lib_pays_eng"=>"Autrichia","numero_pays"=>"40","code_alpha2"=>"AT","code_alpha3"=>"AUT"],
        ];

        foreach($data as $d){
            Pays::create($d);
        }
    }
}
