var aplicacion, $form, tabla;
$(function() {
	aplicacion = new app('formulario', {
		'limpiar' : function(){
			tabla.ajax.reload();
		}
	});

	$form = aplicacion.form;

	tabla = datatable('#tabla', {
		ajax: $url + "datatable",
		columns: [{"data":"nombre_banco","name":"nombre_banco"}]
	});
	
	$('#tabla').on("click", "tbody tr", function(){
		aplicacion.buscar(this.id);
	});
});