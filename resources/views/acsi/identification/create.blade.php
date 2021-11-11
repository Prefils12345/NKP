@extends("acsi.layout.app")
@section('title')
    Création identification
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/wizard.css')}}">
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
                                    <!-- Form wizard with step validation section start -->
                <section id="validation">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Création identifiant</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="#" class="steps-validation wizard-circle">

                                            <!-- Step 1 -->
                                            <h6>Etape 1</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstName3">
                                                                Prénom :
                                                                {{-- <span class="danger">*</span> --}}
                                                            </label>
                                                            <input type="text" class="form-control" id="prenom_personne" name="prenom_personne">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastName3">
                                                                Nom  :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control required" id="nom_personne" name="nom_peronne">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="emailAddress5">
                                                                Nom de la jeune fille :
                                                                {{-- <span class="danger">*</span> --}}
                                                            </label>
                                                            <input type="text" class="form-control" id="nom_jeune_fille" name="nom_jeune_fille">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="location">
                                                                Sexe :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <select class="custom-select form-control" id="sexe" name="sexe">
                                                                <option value="">Selectionner</option>
                                                                <option value="M">Masculin</option>
                                                                <option value="F">Féminin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <!-- Step 2 -->
                                            <h6>Etape 2</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="proposalTitle3">
                                                                Date de naissance :
                                                                {{-- <span class="danger">*</span> --}}
                                                            </label>
                                                            <input type="date" class="form-control" id="date_naissance" name="date_naissance">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="emailAddress6">
                                                                    Lieu de naissance :
                                                                {{-- <span class="danger">*</span> --}}
                                                            </label>
                                                            <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="eventType3">
                                                                Nationnalité :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <select class="custom-select form-control required" id="id_pays" name="id_pays">
                                                                <option value="">Selectionner</option>
                                                                @forelse ($pays as $pay)
                                                                    <option value="{{$pay->id_pays}}">{{$pay->lib_pays_fr}}</option>
                                                                @empty
                                                                    
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="emailAddress6">
                                                                    Peronne contact :
                                                                {{-- <span class="danger">*</span> --}}
                                                            </label>
                                                            <input type="text" class="form-control" id="nom_prenom_personne_contact" name="nom_prenom_personne_contact">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <!-- Step 3 -->
                                            <h6>Etape 3</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="eventName3">
                                                                Nom père :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control required" id="nom_pere" name="nom_pere">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="eventName3">
                                                                Nom mère :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control required" id="nom_mere" name="nom_mere">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="eventName3">
                                                                Téléphone personne contact :
                                                                {{-- <span class="danger">*</span> --}}
                                                            </label>
                                                            <input type="text" class="form-control" id="telephone_personne_contact" name="telephone_personne_contact">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="eventName3">
                                                                Email peronne contact :
                                                                {{-- <span class="danger">*</span> --}}
                                                            </label>
                                                            <input type="email" class="form-control" id="email_personne_contact" name="email_personne_contact">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <!-- Step 4 -->
                                            <h6>Step 4</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="eventName3">
                                                                Numéro pièce identité personne contact :
                                                                {{-- <span class="danger">*</span> --}}
                                                            </label>
                                                            <input type="text" class="form-control" id="numero_piece_identite_personne_contact" name="numero_piece_identite_personne_contact">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="eventName3">
                                                                Année de naissance :
                                                                {{-- <span class="danger">*</span> --}}
                                                            </label>
                                                            <input type="number" class="form-control" id="annee_naissance_personne" name="annee_naissance_personne">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wizard with step validation section end -->
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
@endsection
@section('scripts')
    <script src="{{asset('app-assets/vendors/js/extensions/jquery.steps.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/wizard-steps.js')}}"></script>
@endsection