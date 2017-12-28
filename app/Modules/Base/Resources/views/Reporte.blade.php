@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
	

	
@endsection

@section('content')
	<div class="row">

		<div class="col-sm-3 col-xs-12"></div>
		<div class="col-sm-6 col-xs-12">
			{!! Form::open(array('id' => 'formulario4')) !!}
                <center><h3 class="font-green">Reportar error</h3></center>
                <p class="hint"> </p>
                
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Nombres y Apellidos</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Nombres y Apellidos" name="nombres" /> 
                </div>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Correo</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Correo" name="correo" /> 
                </div>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Descripcion</label>
                    <textarea class="form-control" placeholder="Descripcion" rows="10" name="descripcion" ></textarea>
                </div>
            
                <div class="form-actions">
                    <button type="button" id="report-submit-btn" class="btn btn-success uppercase pull-right">Enviar</button>
                </div>
			{!! Form::close() !!}
		</div>
    	<div class="col-sm-3 col-xs-12"></div>
		
	</div>
@endsection

@push('js')
	<script>
        $('#report-submit-btn').on('click', function() {
            $('#formulario4').ajaxSubmit({
                'url': $url + 'reporte',
                'type': 'POST',
                'success': function(r) {
                    if (r.s == 's') {
                        new PNotify({
                            title: 'success',
                            text: r.msj,
                            type: 'success',
                            hide: true
                        });
                        location.reload();
                    }
                }
            });
        });
	</script>
@endpush