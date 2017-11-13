var aplicacion, $form, tabla;
$(function () {
    aplicacion = new app('formulario', {
        'antes': function (accion) {

        },
        'limpiar': function () {
            tabla.ajax.reload();
           
        },
        'buscar': function (r) {

        }
    });
    $form = aplicacion.form;

    tabla = datatable('#tabla', {
        ajax: $url + "datatable",
        columns: [{
            "data": "titulo",
            "name": "titulo"
        }]
    });

    $('#tabla').on("click", "tbody tr", function () {
        aplicacion.buscar(this.id);
     
    });

});

