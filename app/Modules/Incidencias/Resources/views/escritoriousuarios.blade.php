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

    {{-- 
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
					<div class="number">{{ $casos_resultos }}</div>
					<div class="desc"> RESUELTOS </div>
				</div>
				<a class="more" href="javascript:;" data-tipo="3"> Total Consultas Atendidas
					<i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
	</div>
	--}}
	<div class="row">
		<div class="col-md-3">	
			<div class="list-group">
				<a href="#" class="list-group-item active"><center>Links</center></a>
				<a href="{{ url('/') }}" class="list-group-item"><i class="fa fa-home" aria-hidden="true"></i> Ir ha Pagina web </a>
		    	<a href="{{ url(Config::get('admin.prefix').'/incidencias/incidencias') }}" class="list-group-item "><i class="fa fa-plus" aria-hidden="true"></i> Nueva Consulta</a>
				 <a href="{{ url('ventas/reporte/imprimir') }}" class="list-group-item" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Clientes</a>  --}}
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
			<div class="panel-group accordion" id="accordion">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion3" href="#collapse_3">
								<center>
									<center><h2  class="panel-title">Planes de nuestro Team</h2></center>
								</center> 
							</a>
						</h4>
					</div>
					<div id="collapse_3" class="panel-collapse in">
						<div class="panel-body" style="overflow: auto;max-height: 300px;">
							<ol>
								<li><p><b>Consulta express</b> 
									Este tipo de consulta permite  
									que en el transcurso de 24 h estemos 
									en contacto y recibas asesoría VIP, 
									personalizada en cualquier problema 
									digestivo de tu hijo.
									<ul>	
										<li type="square">30 $ Residentes Venezuela 70milbsF</li>
									</ul>

								</p></li>
								<li><p><b>Tu gastopediatra en Acción</b> 
									Si tu hijo tiene síntomas como vómito, 
									reflujo,  cólico, irritabilidad, diarrea, estreñimiento,  
									pujo, erupciones en el cuerpo, trastornos del sueño, 
									cuadros respiratorios recurrentes, flatulencias,
									sensación de plenitud,  dolor abdominal u otra afectación intestinal,
									tu gastropediatra en acción tiene la solución para ti.   3 consultas 
									que garantizan su mejoría  en 24 h- 72 h y el seguimiento en la primera 
									semana de diagnóstico y tratamiento. 
									<ol>
										<li> Reconocimiento y evaluación inicial</li>
										<li> Evolución a las 48h </li>
										<li> Seguimiento (7mo dia)</li>
									</ol>
									<ul>	
										<li type="square">60$ 150milBsF residentes VE</li>
									</ul>
								</p></li>
								<li>
									<p><b>Consulta 1 &amp; 1 </b> Siempre tenemos dudas de acuerdo a la dieta de nuestros niños y más cuando ya ha presentado algunos síntomas y  tenemos un diagnóstico, pero realmente, ¿qué puede comer mi hijo? ¿que puede comer una madre lactando a un niño con intolerancia alimentaria? </p> 
									<p>Esta  consulta es la respuesta para tus interrogantes en la  alimentación del niño con intolerancias, alergias alimentarias o sensibilidad al gluten y de la madre que amamanta. </p>

									<ul>	
										<li type="square">30$  70milbsF residentes VE</li>
									</ul>
								</li>

							</ol>
						</div>
					</div>
				</div>
			</div>
			
			<a href="{{ url('/public/pdf/Guía_Pasos_Pdf.pdf') }}" target="_blank" >
				<img src="{{ url('/public/img/banens_regalo.jpg') }}" alt="" class="" style="margin: 20px 0; width: 100%;" />
			</a>
			
			<div class="panel-group accordion" id="accordion3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">
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
