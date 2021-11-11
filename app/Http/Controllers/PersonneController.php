<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\Personne;
use Illuminate\Http\Request;
use App\Http\Acsi\AcsiIdentification;
use Illuminate\Support\Facades\Storage;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnes = Personne::all();
        return view("acsi.identification.index", compact("personnes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pays = Pays::all();
        return view("acsi.identification.create", compact("pays"));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personne = new Personne();
        $personne->prenom_personne = $request->prenom_personne;
        $personne->nom_personne = $request->nom_personne;
        $personne->sexe = $request->sexe;
        $personne->id_pays = $request->id_pays;
        $personne->date_naissance = $request->date_naissance;
        $personne->lieu_naissance = $request->lieu_naissance;
        $personne->nom_jeune_fille = $request->nom_jeune_fille;
        $personne->nom_pere = $request->nom_pere;
        $personne->nom_mere = $request->nom_mere;
        $personne->nom_prenom_personne_contact = $request->nom_prenom_personne_contact;
        $personne->telephone_personne_contact = $request->telephone_personne_contact;
        $personne->email_personne_contact = $request->email_personne_contact;
        $personne->num_piece_identite_personne_contat = $request->numero_piece_identite_personne_contact;
        $personne->annee_naissance_personne = $request->annee_naissance_personne;
        $personne->sequence = "A01";
        $occurence = $this->getsequence();
        $personne->numero_personne = AcsiIdentification::uniqueId($personne,$occurence);
        $personne->save();
        return response()->json([
            "code"=>"200",
            "msg"=>"Identification effectuée avec succès",
            "action"=>"redirect",
            "location"=>route('personne.capture',$personne->id_personne),
            "personne"=>$personne
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getsequence(){
        $seq = 0;
        $personne = Personne::whereSequence("A01")->orderBy('id_personne','desc')->first();
        if($personne==null){
            $seq = $seq;
            return $seq +1;
        }

        $seq = (int) $personne->id_personne + 1;
        return $seq;
    }

    public function capture($id)
    {
        $personne = Personne::find($id);
        return view("acsi.identification.capture",compact("personne"));
    }

    public function capturestore(Request $request,$id){
        $personne = Personne::find($id);
        if($personne==null){

        }
        $image = $request->personne_photo;
        $image = base64_decode($image);
    
        $nom_image = $personne->numero_personne.'.png';
        $result = Storage::disk('public')->put($nom_image,$image);
        
    
        if($result) {
            $personne->identifiant_photo = $nom_image;
            $personne->save();
            return "reussie";
        } else {
            return "echec";
        }
    }
}
