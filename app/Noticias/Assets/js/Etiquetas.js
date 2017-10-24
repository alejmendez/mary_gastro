var aplicacion, $form, tabla;
$(function() {
	aplicacion = new app('formulario', {
		'antes' : function(accion){

        },
		'limpiar' : function(){
			tabla.ajax.reload();
            $('#nombre, #slug, #descripcion', $form).html('');
        },
        'buscar' : function(r){

        }
    });
    $form = aplicacion.form;

	tabla = datatable('#tabla', {
		ajax: $url + "datatable",
		columns: [{"data":"nombre","name":"nombre"},{"data":"slug","name":"slug"}]
	});

	$('#tabla').on("click", "tbody tr", function(){
		aplicacion.buscar(this.id);
		console.log('Hola mundo');
	});

});
	$(document).ready(function () {
		$("#nombre").keyup(function () {
			var value = slug($("#nombre").val());
			$("#slug").val(value);
		});
	});

	function stringToJson(str){
		return $.parseJSON(str);
	}

	function jsonToString(json){
		return JSON.stringify(json);
	}
