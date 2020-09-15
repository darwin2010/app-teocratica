$(document).ready(function () {
    Sertec.validacionGeneral('form-general');
    $("nombre").on("change", function(){
        $("#slug").val($(this).val().toLowerCase().replace(/ /g, "-"))
    })
});