var aplicacion, $form, tabla;
$(function() {
	aplicacion = new app('formulario', {
		'antes': function (accion) {
			$("#descripcion").val(CKEDITOR.instances.editor.getData());
		},
		'limpiar': function () {
			tabla.ajax.reload();
			CKEDITOR.instances.editor.setData('');
		},
		'buscar': function (r) {
			CKEDITOR.instances.editor.setData(r.descripcion);
		}
	});

	$form = aplicacion.form;
	
	CKEDITOR.replace('editor', {
		allowedContent: true,
		forcePasteAsPlainText: true
	});

	tabla = datatable('#tabla', {
		ajax: $url + "datatable",
		columns: [
			{"data":"titulo","name":"titulo"},
			{"data":"descripcion","name":"descripcion"}
		]
	});
	
	$('#tabla').on("click", "tbody tr", function(){
		aplicacion.buscar(this.id);
	});
});