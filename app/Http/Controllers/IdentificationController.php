<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Pays;
use App\Models\EtatCivil;
use App\Models\Departement;
use App\Models\TypeIdentite;
use Illuminate\Http\Request;
use App\Models\Identification;
use App\Http\Acsi\AcsiIdentification;
use App\Http\Acsi\AcsiIdentificationFacade;
use Illuminate\Support\Facades\Storage;

class IdentificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $identifications = Identification::all();
        return view("acsi.identification.index", compact("identifications"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeidentites = TypeIdentite::all();
        $departements = Departement::all();
        $etatcivils = EtatCivil::all();
        $pays = Pays::all();
        return view("acsi.identification.create", compact("typeidentites", "departements", "pays", "etatcivils"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "prenom" => ["required", "string"],
            "nom" => ["required", "string"],
            "sexe" => ["required", "string"],
            "date_naissance" => ["required"],
            "lieu_naissance" => ["required"],
            "pays_id" => ["required"],
            "etat_civils_id" => ["required"],
            "type_piece" => ["required"],
            "numero_piece" => ["required"],
            "departements_id" => ["required"],
            "nom_pere" => ["required", "string"],
            "nom_mere" => ["required", "string"],
            "profession" => ["required", "string"],
            "personne_contact" => ["required", "string"],
            "telephone_personne_contact" => ["required", "string"]
        ]);

        

        try {
            $identification = new Identification();
            $identification->prenom = $request->prenom;
            $identification->nom = $request->nom;
            $identification->sexe = $request->sexe;
            $identification->date_naissance = $request->date_naissance;
            $identification->lieu_naissance = $request->lieu_naissance;
            $identification->email = $request->email;
            $identification->telephone = $request->phone;
            $identification->nom_pere = $request->nom_pere;
            $identification->nom_mere = $request->nom_mere;
            $identification->adresse = $request->adresse;
            $identification->pays_id = $request->pays_id;
            $identification->etat_civils_id = $request->etat_civils_id;
            $identification->numero_identite = $request->numero_piece;
            $identification->departements_id = $request->departements_id;
            $identification->personne_contact = $request->personne_contact;
            $identification->type_identites_id = $request->type_piece;
            $identification->profession = $request->profession;
            $identification->created_at = now();
            $identification->telephone_personne_contact = $request->telephone_personne_contact;
            $identification->identifiant_unique = AcsiIdentification::uniqueId($identification,2);
            $identification->save();
            toastr()->success("Identification réussie");
            return redirect()->route("identification.capture", $identification->id);
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back()->withInput();
        }
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

    public function capture($id)
    {
        $identification = Identification::find($id);
        return view("acsi.identification.capture",compact("identification"));
    }

    public function capturestore(Request $request,$id){
        $identification = Identification::find($id);
        if($identification==null){

        }
        $image = $request->identification_photo;
        $image = base64_decode($image);
    
        $nom_image = $identification->identifiant_unique.'.jpeg';
        $result = Storage::disk('public')->put($nom_image,$image);
        
    
        if($result) {
            $identification->identifiant_photo = $nom_image;
            $identification->save();
            return "reussie";
        } else {
            return "echec";
        }
    }

    
}
