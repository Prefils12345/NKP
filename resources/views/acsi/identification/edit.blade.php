@extends('admin.layouts.app')
@section('title')
    Ajouter une vaccination
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/plugins/forms/checkboxes-radios.css')}}">
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="horizontal-form-layouts">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    <form class="form form-horizontal" method="POST" action="{{route('vaccination.update',$opvac->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-user"></i> Information de la personne</h4>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput1">Prénom *</label>
                                                <div class="col-md-9 mx-auto">
                                                    <input type="text" id="projectinput1" class="form-control @error('prenom') is-invalid @enderror" placeholder="Prénom" value="{{$opvac->prenom}}" name="prenom" required>
                                                    @error('prenom')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput1">Nom *</label>
                                                <div class="col-md-9 mx-auto">
                                                    <input type="text" id="projectinput1" class="form-control @error('nom') is-invalid @enderror" placeholder="Nom" value="{{$opvac->nom}}" name="nom" required>
                                                    @error('nom')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                         
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput6">Sexe *</label>
                                                <div class="col-md-9 mx-auto">
                                                    <select id="projectinput6" name="sexe" class="form-control @error('sexe') is-invalid @enderror" required>
                                                        <option value="">Choisir le sexe</option>
                                                        <option value="M" {{"M"==$opvac->sexe ? "selected":""}}>Masculin</option>
                                                        <option value="F" {{"F"==$opvac->sexe ? "selected":""}}>Féminin</option>
                                                    </select>
                                                    @error('sexe')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput1">Date de naissance *</label>
                                                <div class="col-md-9 mx-auto">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="date" value="{{$opvac->date_naissance}}" id="projectinput1" class="form-control @error('date_naissance') is-invalid @enderror" placeholder="Date de naissance" name="date_naissance">
                                                            @error('date_naissance')
                                                                <div class="invalid-feedback">
                                                                        {{$message}}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput1">Lieu de naissance * </label>
                                                <div class="col-md-9 mx-auto">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" value="{{$opvac->lieu_naissance}}" id="projectinput1" class="form-control @error('lieu_naissance') is-invalid @enderror" placeholder="Lieu de naissance" name="lieu_naissance">
                                                            @error('lieu_naissance')
                                                                <div class="invalid-feedback">
                                                                        {{$message}}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput6">Nationalité *</label>
                                                <div class="col-md-9 mx-auto">
                                                    <select id="projectinput6" name="pays_id" class="form-control @error('pays_id') is-invalid @enderror" required>
                                                        <option value="">Choisir une nationalité</option>
                                                        @forelse ($pays as $pay)
                                                            <option value="{{$pay->ID_PAYS}}" {{$pay->ID_PAYS==$opvac->pays_id ? "selected":""}}>{{$pay->LIB_PAYS_FR }}</option>
                                                        @empty
                                                            
                                                        @endforelse
                                                    </select>
                                                    @error('pays_id')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput6">Type de pièce d'indetité *</label>
                                                <div class="col-md-9 mx-auto">
                                                    <select id="projectinput6" name="type_piece" class="form-control @error('type_piece') is-invalid @enderror">
                                                        <option value="">Choisir le type</option>
                                                        <option value="Passport" {{"Passport"==$opvac->type_piece ? "selected":""}}>Passport</option>
                                                        <option value="Carte nationale identaire" {{"Carte nationale identaire"==$opvac->type_piece ? "selected":""}}>CNI</option>
                                                        <option value="Carte de séjour" {{"Carte de séjour"==$opvac->type_piece ? "selected":""}}>Carte de séjour</option>
                                                        <option value="Carte consulaire" {{"Carte consulaire"==$opvac->type_piece ? "selected":""}}>Carte consulaire</option>
                                                        <option value="Permis de conduire" {{"Permis de conduire"==$opvac->type_piece ? "selected":""}}>Permis de conduire</option>
                                                        <option value="Carte étudiant" {{"Carte étudiant"==$opvac->type_piece ? "selected":""}}>Carte d'étudiant</option>
                                                        <option value="Carte d'élève" {{"Carte d'élève"==$opvac->type_piece ? "selected":""}}>Carte d'élève</option>
                                                    </select>
                                                    @error('type_piece')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput1">Numéro pièce identité </label>
                                                <div class="col-md-9 mx-auto">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" value="{{$opvac->numero_piece}}" id="projectinput1" class="form-control @error('numero_piece') is-invalid @enderror" placeholder="Numéro pièce" name="numero_piece">
                                                            @error('numero_piece')
                                                                <div class="invalid-feedback">
                                                                        {{$message}}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput1">Téléphone </label>
                                                <div class="col-md-9 mx-auto">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" value="{{$opvac->phone}}" id="projectinput1" class="form-control @error('phone') is-invalid @enderror" placeholder="Téléphone" name="phone">
                                                            @error('phone')
                                                                <div class="invalid-feedback">
                                                                        {{$message}}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput1">Email </label>
                                                <div class="col-md-9 mx-auto">
                                                    <input type="email" value="{{$opvac->email}}" id="projectinput1" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput1">Adresse Physique *</label>
                                                <div class="col-md-9 mx-auto">
                                                    <input type="text" value="{{$opvac->adresse_physique}}" id="projectinput1" class="form-control @error('adresse_physique') is-invalid @enderror" placeholder="Adresse" name="adresse_physique" required>
                                                    @error('adresse_physique')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput1">Profession *</label>
                                                <div class="col-md-9 mx-auto">
                                                    <input type="text" value="{{$opvac->profession}}" id="projectinput1" class="form-control @error('profession') is-invalid @enderror" placeholder="Profession" name="profession" required>
                                                    @error('profession')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <h4 class="form-section"><i class="ft-user"></i> Information de la vaccination</h4>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput6">Départements *</label>
                                                <div class="col-md-9 mx-auto">
                                                    <select id="departement_id" name="departement" class="form-control @error('departement') is-invalid @enderror" required>
                                                        <option value="">Choisir un département</option>
                                                        @forelse ($departements as $dep)
                                                            <option value="{{$dep->ID_DEPARTEMENT}}" {{$dep->ID_DEPARTEMENT==$opvac->site->districtsanitaire->departement->ID_DEPARTEMENT ? "selected":""}}>{{$dep->LIB_DEPARTEMENT }}</option>
                                                        @empty
                                                            
                                                        @endforelse
                                                    </select>
                                                    @error('departement')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput6">District Sanitaire *</label>
                                                <div class="col-md-9 mx-auto">
                                                <select class="form-control @error('district_sanitaire') is-invalid @enderror" name="district_sanitaire" id="district_sanitaire">
                                                    <option value="{{$opvac->site->districtsanitaire->ID_DISTRICT_SANITAIRE}}">{{$opvac->site->districtsanitaire->LIB_DISTRICT_SANITAIRE}}</option>
                                                    
                                                </select>
                                                @error('district_sanitaire')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control">Site de vaccination</label>
                                                <div class="col-md-9 mx-auto">
                                                <select class="form-control @error('site_id') is-invalid @enderror" name="site_id" id="site_id">
                                                    <option value="{{$opvac->site_id}}">{{$opvac->site->LIB_SITE_VACCINATION}}</option>
                                                </select>
                                                @error('site_id')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput6">Type du vaccin *</label>
                                                <div class="col-md-9 mx-auto">
                                                    <select id="projectinput6" name="type_vaccin_id" class="form-control @error('type_vaccin_id') is-invalid @enderror" required>
                                                        <option value="">Choisir un type de vaccin</option>
                                                        @forelse ($typevaccins as $typevaccin)
                                                            <option value="{{$typevaccin->ID_TYPE_VACCIN}}" {{$typevaccin->ID_TYPE_VACCIN==$opvac->type_vaccin_id ? "selected":""}}>{{$typevaccin->LIB_TYPE_VACCIN }}</option>
                                                        @empty
                                                            
                                                        @endforelse
                                                    </select>
                                                    @error('type_vaccin_id')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput1">Dose *</label>
                                                <div class="col-md-9 mx-auto">
                                                    <input type="text" id="projectinput1" value="{{$opvac->dose}}" class="form-control @error('dose') is-invalid @enderror" placeholder="Dose du vaccin" name="dose">
                                                    @error('dose')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput1">Lot *</label>
                                                <div class="col-md-9 mx-auto">
                                                    <input type="text" id="projectinput1" value="{{$opvac->lot}}" class="form-control @error('lot') is-invalid @enderror" placeholder="lot du vaccin" name="lot">
                                                    @error('lot')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="form-section"><i class="ft-user"></i> Antécédants médicaux, symptômes Covid-19</h4>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="projectinput1">Symptômes Covid </label>
                                            <div class="col-md-9 mx-auto">
                                                <div class="form-group row">
                                                @forelse ($symptomes as $sym)
                                                
                                                    <div class="col-md-3 {{$sym->name=='' ? 'd-none':' '}}">
                                                        <fieldset>
                                                            <input type="checkbox" value="{{$sym->id}}" name="symptomes[]" {{$opvac->symptomes->pluck('id')->unique()->contains($sym->id) ? "checked":""}}>
                                                            <label for="input-11">{{$sym->name}}</label>
                                                        </fieldset>
                                                    </div>
                                                
                                            @empty
                                                
                                            @endforelse
                                        </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="projectinput1">Antecédants médicaux </label>
                                            <div class="col-md-9 mx-auto">
                                                <div class="form-group row">
                                                @forelse ($antecedants as $ant)
                                                
                                                    <div class="col-md-3 {{$ant->name=='' ? 'd-none':' '}}">
                                                        <fieldset>
                                                                <input type="checkbox" value="{{$ant->id}}" name="antecedants[]" {{$opvac->antecedants->pluck('id')->unique()->contains($ant->id) ? "checked":""}}>
                                                                <label for="input-11">{{$ant->name}}</label>
                                                        </fieldset>
                                                    </div>
                                                
                                            @empty
                                                
                                            @endforelse
                                        </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="projectinput6">Avez-vous déjà fait un test covid-19 ? *</label>
                                            <div class="col-md-9 mx-auto">
                                                <select id="projectinput6" name="test_deja_fait" class="form-control @error('test_deja_fait') is-invalid @enderror" required>
                                                    <option value="">Choisir une option</option>
                                                    <option value="1" {{"1"==$opvac->test_deja_fait ? "selected":""}}>Oui</option>
                                                    <option value="0" {{"0"==$opvac->test_deja_fait ? "selected":""}}>Non</option>
                                                </select>
                                                @error('test_deja_fait')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="projectinput6">Avez-vous déjà été positif un test covid-19 ? *</label>
                                            <div class="col-md-9 mx-auto">
                                                <select id="projectinput6" name="test_positif" class="form-control @error('test_positif') is-invalid @enderror" required>
                                                    <option value="">Choisir une option</option>
                                                    <option value="1" {{"1"==$opvac->test_positif ? "selected":""}}>Oui</option>
                                                    <option value="0" {{"0"==$opvac->test_positif ? "selected":""}}>Non</option>
                                                </select>
                                                @error('test_positif')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="projectinput6">Avez-vous déjà été positif un test covid-19 ? *</label>
                                            <div class="col-md-9 mx-auto">
                                                <select id="projectinput6" name="dernier_test_resultat" class="form-control @error('dernier_test_resultat') is-invalid @enderror" required>
                                                    <option value="">Choisir une option</option>
                                                    <option value="1" {{"1"==$opvac->dernier_test_resultat ? "selected":""}}>Positif</option>
                                                    <option value="0" {{"0"==$opvac->dernier_test_resultat ? "selected":""}}>Négatif</option>
                                                </select>
                                                @error('dernier_test_resultat')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="projectinput1">Quelle est la date de votre dernier test ?</label>
                                            <div class="col-md-9 mx-auto">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="date" value="{{$opvac->dernier_test_date}}" id="projectinput1" class="form-control @error('dernier_test_date') is-invalid @enderror" placeholder="Date de naissance" name="dernier_test_date">
                                                        @error('dernier_test_date')
                                                            <div class="invalid-feedback">
                                                                    {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="projectinput1">Statut Vaccin *</label>
                                            <div class="col-md-9 mx-auto">
                                                <select id="projectinput6" name="statut" class="form-control @error('statut') is-invalid @enderror" required>
                                                    <option value="">Choisir une option</option>
                                                    <option value="PARTIELLE" {{"PARTIELLE"==$opvac->statut ? "selected":""}}>PARTIELLE</option>
                                                    <option value="VACCINE" {{"VACCINE"==$opvac->statut ? "selected":""}}>VACCINE</option>
                                                </select>
                                                @error('adresse_physique')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Sauvegarder
                                            </button>
                                            <a href="{{route("vaccination.index")}}" class="btn btn-warning">Retour</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
<!-- END: Content-->

@endsection
@section('scripts')
<script src="{{asset('admin/app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
<script>
    $(function(){
        $('#departement_id').on('change',function(){
                var id = $(this).val();
                var dom = "<option value=''>Selectionnez</option>";
                $.get("{{env('APP_URL')}}/departement/"+id+"/districts",function(data){
                    if(data.length > 0){
                        for(var i=0; i <data.length; i++){
                            dom += "<option value="+data[i].ID_DISTRICT_SANITAIRE +">"+data[i].LIB_DISTRICT_SANITAIRE +"</option>"; 
                        }
                    }
                    $('#district_sanitaire').empty().append(dom);
                });
            });

            $('#district_sanitaire').on('change',function(){
                var id = $(this).val();
                var dom = "<option value=''>Selectionnez</option>";
                $.get("{{env('APP_URL')}}/district/"+id+"/sites",function(data){
                    if(data.length > 0){
                        for(var i=0; i <data.length; i++){
                            dom += "<option value="+data[i].ID_SITE_VACCINATION+">"+data[i].LIB_SITE_VACCINATION+"</option>"; 
                        }
                    }
                    $('#site_id').empty().append(dom);
                });
            });
    });
</script>
@endsection