@extends('acsi.layout.app')
@section('title')
    {{$personne->prenom_personne}}
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset('app-assets/css/components.css')}}">
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Revenue, Hit Rate & Deals -->
            <div class="row">
                <div class="col-xl-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Prise de photo</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a href="#"  class="btn btn-primary" id="accescamera" style="color: white"> <i class="la la-camera"></i> Prendre une photo</a></li>
                                </ul>
                                <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Prendre une Photo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <div id="macamera" class="d-block mx-auto rounded overflow-hidden"></div>
                                                </div>
                                                <div id="results" class="d-none"></div>
                                                <form method="post" id="photoForm">
                                                    @method('PUT')
                                                    <input type="hidden" id="identification_photo" name="identification_photo" value="">
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning mx-auto text-white" id="prise">Prendre la  Photo</button>
                                                <button type="button" class="btn btn-warning mx-auto text-white d-none" id="reprise">Relancer</button>
                                                <button type="submit" class="btn btn-warning mx-auto text-white d-none" id="miseenligne" form="photoForm">Terminer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Revenue, Hit Rate & Deals -->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('app-assets/js/scripts/modal/components-modal.js')}}"></script>
<script src="{{asset('plugin/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('plugin/webcamjs/webcam.min.js')}}"></script>
<script>
    $(document).ready(function() {
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'png',
        jpeg_quality: 90
    });

    $('#accescamera').on('click', function() {
        Webcam.reset();
        Webcam.on('error', function() {
            $('#photoModal').modal('hide');
            swal({
                title: 'Avertissement',
                text: 'Veuillez autoriser l\'accès à la caméra',
                icon: 'warning'
            });
        });
        $('#photoModal').modal({
            backdrop:'static',
            keyboard:false
        });
        Webcam.attach('#macamera');
    });

    $('#prise').on('click', take_snapshot);

    $('#reprise').on('click', function() {
        $('#macamera').addClass('d-block');
        $('#macamera').removeClass('d-none');

        $('#results').addClass('d-none');

        $('#prise').addClass('d-block');
        $('#prise').removeClass('d-none');

        $('#reprise').addClass('d-none');
        $('#reprise').removeClass('d-block');

        $('#miseenligne').addClass('d-none');
        $('#miseenligne').removeClass('d-block');
    });

    $('#photoForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{env('APP_URL')}}/personne/{{$personne->id_personne}}/capture",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                if(data == 'reussie') {
                    Webcam.reset();

                    $('#macamera').addClass('d-block');
                    $('#macamera').removeClass('d-none');

                    $('#results').addClass('d-none');

                    $('#prise').addClass('d-block');
                    $('#prise').removeClass('d-none');

                    $('#reprise').addClass('d-none');
                    $('#reprise').removeClass('d-block');

                    $('#miseenligne').addClass('d-none');
                    $('#miseenligne').removeClass('d-block');

                    $('#photoModal').modal('hide');

                    swal({
                        title: 'Enregistrement réussie',
                        text: 'Photo enregistrée avec succès',
                        icon: 'success',
                        buttons: false,
                        closeOnClickOutside: false,
                        closeOnEsc: false,
                        timer: 2000
                    });
                    // setTimeout(function(){
                    //     $(location).attr("href","{{route('identification.index')}}");
                    // },3000);
                }
                else {
                    swal({
                        title: 'Erreur',
                        text: 'Une erreur est survenue',
                        icon: 'error'
                    })
                }
            }
        })
    })
});

function take_snapshot()
{
    //take snapshot and get image data
    Webcam.snap(function(data_uri) {
        //display result image
        $('#results').html('<img src="' + data_uri + '" class="d-block mx-auto rounded"/>');

        var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
        $('#identification_photo').val(raw_image_data);
    });

    $('#macamera').removeClass('d-block');
    $('#macamera').addClass('d-none');

    $('#results').removeClass('d-none');

    $('#prise').removeClass('d-block');
    $('#prise').addClass('d-none');

    $('#reprise').removeClass('d-none');
    $('#reprise').addClass('d-block');

    $('#miseenligne').removeClass('d-none');
    $('#miseenligne').addClass('d-block');
}
</script>
@endsection