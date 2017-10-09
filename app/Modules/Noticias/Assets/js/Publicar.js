var aplicacion, $form, tabla = false, $archivo;
$(function() {
	aplicacion = new app('formulario', {
		'antes' : function(accion){

		},
		'limpiar' : function(){
			tabla.fnDraw();
			$('#titulo, #resumen, #contenido_html', $form).html('');
		},
		'buscar' : function(r){
			// $('#published_at', $form).val('');
		}
	});

	$form = aplicacion.form;

	$('#published_at', $form).datetimepicker();

    tabla = datatable('#tabla', {
        ajax: $url + "datatable",
        columns: [
            { data: 'titulo', name: 'titulo'},
            { data: 'resumen', name: 'resumen'},

        ]
    });
    $('#tabla').on("click", "tbody tr", function(){
        aplicacion.buscar(this.id);

			console.log(this.id);
    });

});
