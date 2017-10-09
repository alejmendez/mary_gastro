var aplicacion, $form, tabla;
$(function() {
	aplicacion = new app('formulario', {
		'limpiar' : function(){
			console.log('holaaaa');
			
		}
	});

	$form = aplicacion.form;

	tabla = datatable('#tabla', {
		ajax: $url + "datatable",
		columns: [
		    { data: 'nombre',         name: 'nombre'},
			{ data: 'descripcion',    name: 'descripcion'},
			{ data: 'app_usuario_id', name: 'usuario' },
			{ data: 'app_perfil_id',  name: 'perfil' },
			{ data: 'estatus_id',     name: 'estatus' }
		]
	});
	
	$('#tabla').on("click", "tbody tr", function(){
		aplicacion.buscar(this.id);
	});
});