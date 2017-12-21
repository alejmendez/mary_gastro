var aplicacion, $form, tabla = false, $archivo_actual = '', $archivos = {}, cordenadasImagen;
$(function() {
	aplicacion = new app('formulario', {
		'antes' : function(accion){			
			$("#contenido_html").val(CKEDITOR.instances.contenido.getData());

			$("#archivos").val(jsonToString($archivos));
		},
		'limpiar' : function(){
			tabla.fnDraw();
			CKEDITOR.instances.contenido.setData('');

			$archivos = {};

			$("table tbody tr", "#fileupload").remove();
		},
		'buscar' : function(r){
			CKEDITOR.instances.contenido.setData(r.contenido_html);
			
			$("table tbody", "#fileupload").html(tmpl("template-download", r));
			$("table tbody .fade", "#fileupload").addClass('in');

			var archivos = r.files;
			$archivos = {};
			for(var i in archivos){
				$archivos[archivos[i].id] = archivos[i].data;
			}
		}
	});

	$form = aplicacion.form;
	
	$("#titulo").blur(function(){
		$("#slug").val(slug($("#titulo").val()));
	});

	$("#slug").blur(function(){
		$("#slug").val(slug($("#slug").val()));
	});

	$('#published_at', $form).datetimepicker();

	var contenido = CKEDITOR.replace('contenido');

	$('#fileupload').fileupload({
		// Uncomment the following to send cross-domain cookies:
		//xhrFields: {withCredentials: true},
		url: $url + 'subir',
		disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
		maxFileSize: 999000,
		//formData: {example: 'test'},
		acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
	}).bind('fileuploaddone', function (e, data) {
		var archivo = data.result.files[0];
		$archivos[archivo.id] = archivo.data;
	});

	$('#fileupload').on('click', '.btn-info', function(evn){
		evn.preventDefault();
		$archivo_actual = $(this).parents('tr').data('id');

		$("#editar_imagen").modal('show');
		
		$('#contImagen').html('<img src="' + $(this).data('url') + '" class="img-responsive" style="width: 100%;" />');

		$('img', '#contImagen').Jcrop({
			onChange: dataImagen,
			onSelect: dataImagen,
			boxWidth: 450, 
			boxHeight: 400
		});

		$("#descripcion", "#editar_imagen").val($archivos[$archivo_actual].descripcion);
		$("#leyenda", "#editar_imagen").val($archivos[$archivo_actual].leyenda);

		return false;
	});

	$('#fileupload').on('click', '.btn-danger', function(evn){
		evn.preventDefault();
		delete $archivos[$(this).parents('tr').data('id')];
	});

	$("#editar_imagen").on("click", "#btn_guardar_imagen", function(){
		$archivos[$archivo_actual].cordenadas = cordenadasImagen;
		$archivos[$archivo_actual].descripcion = $("#descripcion", "#editar_imagen").val();
		$archivos[$archivo_actual].leyenda = $("#leyenda", "#editar_imagen").val();

		$("tr[data-id='" + $archivo_actual + "'] .leyenda", '#fileupload').text($("#leyenda", "#editar_imagen").val());

		$("#editar_imagen").modal('hide');
	});

	$('#myModal').on('show.bs.modal', function (e) {
		cordenadasImagen = [];
	})

	tabla = $('#tabla')
	.on('click', 'tbody tr', function(){
		aplicacion.buscar(this.id);
	})
	.dataTable({
		processing: true,
		serverSide: true,
		ajax: $url + "datatable",
		columns: [
			{ "data" : "nombre", "name" : "app_usuario.nombre" },
			{ "data" : "titulo", "name" : "titulo" },
			{ "data" : "resumen", "name" : "resumen" },
			{ "data" : "published_at", "name" : "published_at" }
		],
		"order": [[ 3, "desc" ]],
		"oLanguage": datatableEspanol
	});
});

function dataImagen(cordenadas){
	cordenadasImagen = cordenadas;
}

function stringToJson(str){
	return $.parseJSON(str);
}

function jsonToString(json){
	return JSON.stringify(json);
}