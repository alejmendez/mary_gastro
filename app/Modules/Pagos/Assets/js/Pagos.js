var aplicacion, $form, tabla;
$(function() {
    aplicacion = new app('formulario', {
        'limpiar': function() {

        }
    });

    //$('#guardar span', '#botonera').html('Enviar');
    $('#eliminar', '#botonera').remove();
    $('#buscar', '#botonera').remove();
    //$('#cod_referencia').prop('disabled', true);

    /* $('#tipo_deposito').on('change', function(){
    	if($('#tipo_deposito').val() == 0 ){
    		$('#cod_referencia').prop('disabled', false);
    	}else{
    		$('#cod_referencia').prop('disabled', true);
    	}
    }); */

    $("#fecha").datepicker({
        altFormat: "yyyy-mm-dd"
    });

});