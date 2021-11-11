<?php

namespace App\Http\Acsi;

use App\Models\Identification;
use App\Models\Personne;
use Illuminate\Support\Facades\Crypt;

class AcsiIdentification {
    /**
     * // A1 MS MS 0000001 M 90  (21+11)
     * 
     * MSMM3M210
     */
    public static function uniqueId( Personne $personne,int $lastid):string{

        $inom = substr($personne->nom_personne,0,1);
        $iprenom = substr($personne->prenom_personne,0,1);
        $inompere = substr($personne->nom_pere,0,1);
        $inommere = substr($personne->nom_mere,0,1);
        $occurance = $lastid + 1;
        $isexe = substr($personne->sexe,0,1);
        $ianneenaissance = substr($personne->date_naissance,2,2);
        $ianneeidentification = substr($personne->created_at,2,2);
        $imoisidentification = substr($personne->created_at,5,2);
        $sommeanneemoisidentification = (int) $ianneeidentification + (int) $imoisidentification;
        
        $lastString = $inom.$iprenom.$inompere.$inommere.$occurance.$isexe.$ianneenaissance.$sommeanneemoisidentification;
        return $lastString;
    }

    

    
}