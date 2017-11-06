@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
	@include('base::partials.ubicacion', ['ubicacion' => ['Escritorio']])
@endsection

@section('content')

    <div class="row">
		<div class="col-md-6">
			<div class="dashboard-stat  green-jungle ">
				<div class="visual">
					<i class="fa fa-check"></i>
				</div>
				<div class="details">
					<div class="number">{{$consultas}}</div>
					<div class="desc"> disponibles </div>
				</div>
				<a class="more" href="javascript:;" data-tipo="1"> Numero de casos disponibles
					<i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="dashboard-stat  red-thunderbird ">
				<div class="visual">
					<i class="fa fa-times-circle-o"></i>
				</div>
				<div class="details">
					<div class="number">00</div>
					<div class="desc"> Resultos </div>
				</div>
				<a class="more" href="javascript:;" data-tipo="3"> Total casos Resultos
					<i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">	
			<div class="list-group">
				<a href="#" class="list-group-item active"><center>Opciones</center></a>
				<a href="{{ url('/') }}" class="list-group-item"><i class="fa fa-home" aria-hidden="true"></i> Ir ha Pagina web </a>
		
			{{--  	<a href="{{ url('/pagos/') }}" class="list-group-item "><i class="fa fa-usd" aria-hidden="true"></i> Registro de pagos</a>  --}}

				{{--  <a href="{{ url('ventas/reporte/imprimir') }}" class="list-group-item" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Clientes</a>  --}}
				
				{{--  <a href="{{ url('ventas/escritorio/planesactivos') }}" class="list-group-item" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Planes Activos</a>  --}}
				
			</div>
		</div> 
		<div class="col-md-9">
			<div class="panel-group accordion" id="accordion3">
		        <div class="panel panel-primary">
		            <div class="panel-heading">
		                <h4 class="panel-title">
		                	<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1"><center><h3 class="panel-title">Consultas</h3></center> </a>
		                </h4>
		            </div>
		            <div id="collapse_3_1" class="panel-collapse in">
		                <div class="panel-body">
		            		<center><table id="tabla1" class="table table-striped table-hover table-bordered tables-text">
								<thead>
									<tr>
										<th style="width: 25%; text-align: center;">Fecha de Solicitud</th>
										<th style="width: 25%; text-align: center;">Tipo de Consulta</th>
										<th style="width: 25%; text-align: center;">Estatus</th>
										<th style="width: 25%; text-align: center;">Fecha cierre</th>
									</tr>
								</thead>
							</table></center>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
	  
@endsection
