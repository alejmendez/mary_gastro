var aplicacion, $form, tabla;
$(function() {
    aplicacion = new app('formulario', {
        'limpiar': function() {
            tabla.ajax.reload();
        }
    });

    $form = aplicacion.form;

    tabla = datatable('#tabla', {
        ajax: $url + "datatable",
        columns: [
            { "data": "dni", "name": "personas.dni" },
            { "data": "nombres", "name": "personas.nombres" },
            { "data": "banco_emisor", "name": "banco_emisor" },
            { "data": "banco_receptor", "name": "banco_receptor" },
            { "data": "nombre", "name": "planes.nombre" },
            { "data": "monto", "name": "pagos.monto" },
            { "data": "fecha", "name": "pagos.fecha" },
            { "data": "created_at", "name": "pagos.created_at" }

        ]
    });


    $('#tabla').on("click", "tbody tr", function() {

        //location.href = $url + 'detalles/' + this.id;

    });
});