var aplicacion, $form, tabla;
$(function() {
    aplicacion = new app('formulario', {});

    $form = aplicacion.form;
    $('#guardar span', '#botonera').html('Enviar');
    $('#eliminar', '#botonera').remove();
    $('#buscar', '#botonera').remove();

    if (casos == 0) {
        $('#guardar', '#botonera').remove();
    }
});