var aplicacion, $form, tabla, $archivo_actual = '', $archivos = {}, cordenadasImagen;
$(function() {
	aplicacion = new app('formulario', {
		'antes' : function(accion){
			$("#archivos").val(jsonToString($archivos));
			$("#contenido_html").val(CKEDITOR.instances.contenido.getData());
		},
		'limpiar' : function(){
			tabla.ajax.reload();
			CKEDITOR.instances.contenido.setData('');
			$('#archivos').val('');
			$archivos = {};
            $("table tbody tr", "#fileupload").remove();

            $('#etiquetas').tagsinput('removeAll');
		},
	    'buscar' : function(r){
            $('#etiquetas').tagsinput('removeAll');
			CKEDITOR.instances.contenido.setData(r.contenido_html);
			$('#btn1').click();

			$("table tbody", "#fileupload").html(tmpl("template-download", r));
			$("table tbody .fade", "#fileupload").addClass('in');

			var archivos = r.files;
			$archivos = {};
			for(var i in archivos){
				$archivos[archivos[i].id] = archivos[i].data;
            }
            console.log(r.etiquetas);
            
            $("#etiquetas").tagsinput('add', r.etiquetas);
		}
	});

	$form = aplicacion.form;

	$('#eliminar').attr("disabled", true);

    tabla = datatable('#tabla', {
        ajax: $url + "datatable",
        columns: [
            { data: 'titulo', name: 'titulo'},
            { data: 'resumen', name: 'resumen'},
        ]
    });

    $('#tabla').on("click", "tbody tr", function(){
        aplicacion.buscar(this.id);
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

        $('#contImagen').html('<img src="' + $(this).data('url') + '"class="img-responsive" style="width: 100%;" />');

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

	// btn_guardar_imagen

    $('#fileupload').on('click', '.btn-danger', function(evn){
        evn.preventDefault();
        delete $archivos[$(this).parents('tr').data('id')];

    });

    $("#editar_imagen").on("click", "#btn_guardar_imagen", function () {
        $archivos[$archivo_actual].cordenadas = cordenadasImagen;
        $archivos[$archivo_actual].descripcion = $("#descripcion", "#editar_imagen").val();
        $archivos[$archivo_actual].leyenda = $("#leyenda", "#editar_imagen").val();

        $("tr[data-id='" + $archivo_actual + "'] .leyenda", '#fileupload').text($("#leyenda", "#editar_imagen").val());

        $("#editar_imagen").modal('hide');
    });

    $('#myModal').on('show.bs.modal', function (e) {
        cordenadasImagen = [];
    });
});

$(document).ready(function () {
	$("#titulo").keyup(function () {
        var value = slug($("#titulo").val());
        $("#slug").val(value);
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
