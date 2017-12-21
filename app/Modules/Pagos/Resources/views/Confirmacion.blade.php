@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
    
    @include('base::partials.ubicacion', ['ubicacion' => ['Pagos']])
    
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
		<div class="panel-group accordion" id="accordion">
			<div class="panel-group accordion" id="accordion3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">
								<center>
									<h3 class="panel-title">Pagos</h3>
								</center> 
							</a>
						</h4>
					</div>
					<div id="collapse_3_1" class="panel-collapse in">
						<div class="panel-body">
							<center>
								<table id="tabla" class="table table-striped table-hover table-bordered tables-text">
									<thead>
										<tr>
											<th style="width: 14.28%; text-align: center;">DNI</th>
											<th style="width: 14.28%; text-align: center;">Solicitante</th>
											<th style="width: 14.28%; text-align: center;">Banco Emisor</th>
											<th style="width: 14.28%; text-align: center;">Banco Receptor</th>
											<th style="width: 14.28%; text-align: center;">Plan</th>
											<th style="width: 14.28%; text-align: center;">Monto</th>
											<th style="width: 14.28%; text-align: center;">Fecha de pago</th>
											<th style="width: 14.28%; text-align: center;">Registro de pago</th>
										</tr>
									</thead>
								</table>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    </div>
@endsection