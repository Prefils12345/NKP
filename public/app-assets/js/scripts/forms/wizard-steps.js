/*=========================================================================================
    File Name: wizard-steps.js
    Description: wizard steps page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/





// Validate steps wizard

// Show form
var form = $(".steps-validation").show();

$(".steps-validation").steps({
    headerTag: "h6",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: 'Submit'
    },
    onStepChanging: function (event, currentIndex, newIndex) {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex) {
            return true;
        }
        // Forbid next action on "Warning" step if the user is too young
        if (newIndex === 3 && Number($("#age-2").val()) < 18) {
            return false;
        }
        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex) {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onFinishing: function (event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex) {
        var prenom_personne = $('#prenom_personne').val();
        var nom_personne = $('#nom_personne').val();
        var sexe = $('#sexe').val();
        var nom_jeune_fille = $('#nom_jeune_fille').val();
        var date_naissance = $('#date_naissance').val();
        var lieu_naissance = $('#lieu_naissance').val();
        var id_pays = $('#id_pays').val();
        var nom_pere = $('#nom_pere').val();
        var nom_mere = $('#nom_mere').val();
        var nom_prenom_personne_contact = $('#nom_prenom_personne_contact').val();
        var telephone_personne_contact = $('#telephone_personne_contact').val();
        var email_personne_contact = $('#email_personne_contact').val();
        var numero_piece_identite_personne_contact = $('#numero_piece_identite_personne_contact').val();
        var annee_naissance_personne = $('#annee_naissance_personne').val();

        $.post("store",{
            nom_personne:nom_personne,
            prenom_personne:prenom_personne,
            sexe:sexe,
            date_naissance:date_naissance,
            lieu_naissance:lieu_naissance,
            nom_jeune_fille:nom_jeune_fille,
            id_pays:id_pays,
            nom_pere:nom_pere,
            nom_mere:nom_mere,
            nom_prenom_personne_contact:nom_prenom_personne_contact,
            telephone_personne_contact:telephone_personne_contact,
            email_personne_contact:email_personne_contact,
            numero_piece_identite_personne_contact:numero_piece_identite_personne_contact,
            annee_naissance_personne:annee_naissance_personne

        },function(data){
            var action = data.action;
            if(action){
                $(location).attr('href',data.location);
            }
        });
        
    }
});

// Initialize validation
$(".steps-validation").validate({
    ignore: 'input[type=hidden]', // ignore hidden fields
    errorClass: 'danger',
    successClass: 'success',
    highlight: function (element, errorClass) {
        $(element).removeClass(errorClass);
    },
    unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass);
    },
    errorPlacement: function (error, element) {
        error.insertAfter(element);
    },
    rules: {
        email: {
            email: true
        }
    }
});
