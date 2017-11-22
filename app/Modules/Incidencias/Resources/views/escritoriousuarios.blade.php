@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
	@include('base::partials.ubicacion', ['ubicacion' => ['Escritorio']])
@endsection

@push('css')
<style>
.dashboard-stat .more {
    font-size: 16px;
}
</style>
@endpush

@section('content') 

    <div class="row">
		<div class="col-md-6">
			<div class="dashboard-stat  blue ">
				<div class="visual">
					<i class="fa fa-book"></i>
				</div>
				<div class="details">
					<div class="number">{{ $consultas }}</div>
					<div class="desc"> DISPONIBLES </div>
				</div>
				<a class="more" href="javascript:;" data-tipo="1"> Número de consultas disponibles
					<i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="dashboard-stat  green-jungle ">
				<div class="visual">
					<i class="fa fa-check"></i>
				</div>
				<div class="details">
					<div class="number">{{$casos_resultos}}</div>
					<div class="desc"> RESUELTOS </div>
				</div>
				<a class="more" href="javascript:;" data-tipo="3"> Total casos resueltos
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
		
		    	<a href="{{ url(Config::get('admin.prefix').'/incidencias/incidencias') }}" class="list-group-item "><i class="fa fa-plus" aria-hidden="true"></i> Nueva Consulta</a>

				{{--  <a href="{{ url('ventas/reporte/imprimir') }}" class="list-group-item" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Clientes</a>  --}}
				
				{{--  <a href="{{ url('ventas/escritorio/planesactivos') }}" class="list-group-item" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Planes Activos</a>  --}}
				
			</div>
			<div class="list-group">
				<a href="#" class="list-group-item active"><center>Información de pago</center></a>
				<a href="javascript:;" class="list-group-item"> Transferencias electrónicas en Venezuela,<br>
				<i class="fa fa-university" aria-hidden="true"></i> BANCO PROVINCIAL, cuenta corriente<br>
				<i class="fa fa-hashtag" aria-hidden="true"></i> 01080076530100207774<br>
				<i class="fa fa-user-md" aria-hidden="true"></i> MARYRAIDA CANONICCO <br>
				<i class="fa fa-circle" aria-hidden="true"></i> 13798940<br>
				<i class="fa fa-envelope-o" aria-hidden="true"></i> Maryraida@hotmail.com</a>

				<a href="javascript:;" class="list-group-item">Transferencias en dólares<br>
				<i class="fa fa-university" aria-hidden="true"></i> CITIBANK<br>
				<i class="fa fa-hashtag" aria-hidden="true"></i> 927340498</a>

				<a href="javascript:;" class="list-group-item">PYONEER<br>
				<i class="fa fa-university" aria-hidden="true"></i> Maryraida@hotmail.com</a>
		
		    	
				
			</div>
		
		</div> 
		<div class="col-md-9">
			<div class="panel-group accordion" id="accordion3">
		        <div class="panel panel-primary">
		            <div class="panel-heading">
		                <h4 class="panel-title">
		                	<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">
								<center>
									<h3 class="panel-title">Consultas</h3>
								</center> 
							</a>
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
