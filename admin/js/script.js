$(document).ready(function () {

    tinymce.init({
        selector: 'textarea'
    });

    $("select").select2();

    $("table").DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/French.json'
        }
    });
    
    $(".btn-danger").click(function(event){
        var valid = confirm("Etes-vous sur ?");
        if (!valid) {
            event.preventDefault();
        }
    });

});