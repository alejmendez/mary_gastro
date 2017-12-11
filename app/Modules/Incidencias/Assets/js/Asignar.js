var aplicacion, $form, usuario;
$(function() {
    $('#eliminar, #buscar', '#botonera').remove();
    aplicacion = new app('formulario');

    $form = aplicacion.form;
    $("#usuario").change(function() {
        usuario = $(this).val();
        if (usuario == '') {
            aplicacion.id = usuario = 0;
            return;
        }
        aplicacion.id = usuario;
        $.get($url + 'buscar/' + usuario, function(r) {
            $("#consultas").val(r.consultas);
        });
    });
});