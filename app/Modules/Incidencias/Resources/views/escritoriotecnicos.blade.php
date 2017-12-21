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
					<div class="number">{{$casos_resultos}}</div>
					<div class="desc"> Casos resultos </div>
				</div>
				<a class="more" href="javascript:;" data-tipo="1"> Total casos resultos
					<i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<div class="col-md-6">
			<div class="dashboard-stat  yellow ">
				<div class="visual">
					<i class="fa fa-calendar-times-o"></i>
				</div>
				<div class="details">
					<div class="number">{{$incidencias_activas}}</div>
					<div class="desc"> Casos Pendientes </div>
				</div>
				<a class="more" href="javascript:;" data-tipo="2"> Total Casos Pendientes
					<i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">	
			<div class="list-group">
				<a href="#" class="list-group-item active"><center>Opciones</center></a>
				<a href="{{ url('/') }}" class="list-group-item">
                <i class="fa fa-plus" aria-hidden="true"> </i> Opciones 1 </a>
		
				<a href="{{ url(Config::get('admin.prefix').'/pagos/confirmacion') }}" class="list-group-item "><i class="fa fa-search" aria-hidden="true"></i>Pagos</a>

				{{--  <a href="{{ url('ventas/reporte/imprimir') }}" class="list-group-item" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Clientes</a>  --}}
				
				<a href="{{ url('ventas/escritorio/planesactivos') }}" class="list-group-item" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Opciones 3</a>
				
			</div>
		</div> 
		<div class="col-md-9">
			<div class="panel-group accordion" id="accordion3">
		        <div class="panel panel-primary">
		            <div class="panel-heading">
		                <h4 class="panel-title">
		                	<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1"><center><h3 class="panel-title">Casos Activos</h3></center> </a>
		                </h4>
		            </div>
		            <div id="collapse_3_1" class="panel-collapse in">
		                <div class="panel-body">
		            		<center><table id="tabla1" class="table table-striped table-hover table-bordered tables-text">
								<thead>
									<tr>
										<th style="width: 20%; text-align: center;">Fecha de Inicio</th>
										<th style="width: 20%; text-align: center;">Tipo de Consulta</th>
										<th style="width: 20%; text-align: center;">N° cedula</th>
										<th style="width: 20%; text-align: center;">Nombres</th>
										<th style="width: 20%; text-align: center;">Estatus</th>
										
									</tr>
								</thead>
							</table></center>
		                </div>
		            </div>
		        </div>
		    </div>

			<div class="panel-group accordion" id="accordion3">
		        <div class="panel panel-danger">
		            <div class="panel-heading">
		                <h4 class="panel-title">
		                	<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2"><center><h3 class="panel-title">Casos Cerrados</h3></center> </a>
		                </h4>
		            </div>
		            <div id="collapse_3_2" class="panel-collapse in">
		                <div class="panel-body">
		            		<center>
						<table id="tabla2" class="table table-striped table-hover table-bordered tables-text">
							<thead>
								<tr>
									<th style="width: 16.66%; text-align: center;">Fecha de Inicio</th>
									<th style="width: 16.66%; text-align: center;">Tipo de Consulta</th>
									<th style="width: 16.66%; text-align: center;">N° cedula</th>
									<th style="width: 16.66%; text-align: center;">Nombres</th>
									<th style="width: 16.66%; text-align: center;">Estatus</th>
									<th style="width: 16.66%; text-align: center;">Cierre</th>
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
@endsection
