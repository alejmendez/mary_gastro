@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
	@include('base::partials.ubicacion', ['ubicacion' => ['Escritorio']])
@endsection

@push('css')
<style>
	.dashboard-stat .more {
		font-size: 16px;
	}

	.bs-calltoaction{
		position: relative;
		width:auto;
		padding: 15px 25px;
		border: 1px solid black;
		margin-top: 10px;
		margin-bottom: 10px;
		border-radius: 5px;
	}

		.bs-calltoaction > .row{
			display:table;
			width: calc(100% + 30px);
		}
		
			.bs-calltoaction > .row > [class^="col-"],
			.bs-calltoaction > .row > [class*=" col-"]{
				float:none;
				display:table-cell;
				vertical-align:middle;
			}

				.cta-contents{
					padding-top: 10px;
					padding-bottom: 10px;
				}

				
				.cta-contents p{
					font-size: 16px;
				}

				.cta-contents ul, .cta-contents li{
					font-size: 16px;
				}

					.cta-title{
						margin: 0 auto 15px;
						padding: 0;
					}

					.cta-desc{
						padding: 0;
					}

					.cta-desc p:last-child{
						margin-bottom: 0;
					}

				.cta-button{
					padding-top: 10px;
					padding-bottom: 10px;
				}

	@media (max-width: 991px){
		.bs-calltoaction > .row{
			display:block;
			width: auto;
		}

			.bs-calltoaction > .row > [class^="col-"],
			.bs-calltoaction > .row > [class*=" col-"]{
				float:none;
				display:block;
				vertical-align:middle;
				position: relative;
			}

			.cta-contents{
				text-align: center;
			}
	}



	.bs-calltoaction.bs-calltoaction-default{
		color: #333;
		background-color: #fff;
		border-color: #ccc;
	}

	.bs-calltoaction.bs-calltoaction-primary{
		color: #fff;
		background-color: #337ab7;
		border-color: #2e6da4;
	}

	.bs-calltoaction.bs-calltoaction-info{
		color: #fff;
		background-color: #5bc0de;
		border-color: #46b8da;
	}

	.bs-calltoaction.bs-calltoaction-success{
		color: #fff;
		background-color: #5cb85c;
		border-color: #4cae4c;
	}

	.bs-calltoaction.bs-calltoaction-warning{
		color: #fff;
		background-color: #f0ad4e;
		border-color: #eea236;
	}

	.bs-calltoaction.bs-calltoaction-danger{
		color: #fff;
		background-color: #d9534f;
		border-color: #d43f3a;
	}

	.bs-calltoaction.bs-calltoaction-primary .cta-button .btn,
	.bs-calltoaction.bs-calltoaction-info .cta-button .btn,
	.bs-calltoaction.bs-calltoaction-success .cta-button .btn,
	.bs-calltoaction.bs-calltoaction-warning .cta-button .btn,
	.bs-calltoaction.bs-calltoaction-danger .cta-button .btn{
		border-color:#fff;
	}
</style>
@endpush

@section('content') 

<div id="modal_pago1" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">DETALLES PARA ADQUIRIR EL PLAN</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="panel-group accordion" id="accordion_informacion_pago">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion_informacion_pago" href="#collapse_informacion_pago">
											<center>
												<h3 class="panel-title">Informaci??n de Pago</h3>
											</center> 
										</a>
									</h4>
								</div>
							</div>
						</div>
						<div id="collapse_informacion_pago" class="panel-collapse in">
							<div id="collapse_informacion_pago" class="list-group">
								<a href="javascript:;" class="list-group-item"> <b>DATOS BANCARIOS EN VENEZUELA</b><br />
								<i class="fa fa-university" aria-hidden="true"></i> BANCO PROVINCIAL, cuenta corriente<br />
								<i class="fa fa-hashtag" aria-hidden="true"></i> 01080076530100207774<br />>
								<i class="fa fa-user-md" aria-hidden="true"></i> Maryraida Can??nicco <br />
								<i class="fa fa-circle" aria-hidden="true"></i> 13798940<br />
								<i class="fa fa-envelope-o" aria-hidden="true"></i> info@marygastro.com.ve</a>
		
								<a href="javascript:;" class="list-group-item"><b>PAGOS INTERNACIONALES</b><br />
								<i class="fa fa-user-md" aria-hidden="true"></i> Maryraida Can??nicco <br />
								<i class="fa fa-university" aria-hidden="true"></i> CITIBANK<br />
								<i class="fa fa-hashtag" aria-hidden="true"></i> Account 927340498<br />
								<i class="fa fa-hashtag" aria-hidden="true"></i> Aba o Swift 271070801<br />
								<i class="fa fa-address-book" aria-hidden="true"></i> 394 SHADOW CREEK LN RIVERWOODS IL 60015-3873</a>
		
								<a href="javascript:;" class="list-group-item"><b>PAGO V??A PAYPAL</b><br />
								<i class="fa fa-paypal" aria-hidden="true"></i> Puede realizar el pago v??a Paypal en el siguiente bot??n.</a>
								<a href="https://www.paypal.me/marygastro" class="btn btn-primary">Pagar con Paypal</a>
								
								<a href="javascript:;" class="list-group-item"><b>DATOS DE PYONEER</b><br />
								<i class="fa fa-credit-card-alt" aria-hidden="true"></i> Debe enviar su nombre completo y correo asociado a su cuenta PAYONEER al siguiente correo pagos@marygastro.com.ve posteriormente le enviar?? una notificaci??n de cobro.</a>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						Debe adquirir alguno de los paquetes realizando el Pago y notificando en "Registra tu Pago" </br></br>
						<b>Importante:</b> Una vez realizado el pago y notificado al correo se habilitar??n las consultas con la Dra. Mary Gastro  
						<br><br>
						<center>
							<a href="{{ url(Config::get('admin.prefix').'/pagos/pagos') }}" class="btn btn-warning " style="width: 100%;">
								<i class="fa fa-plus" aria-hidden="true"></i> 
								Registra tu pago
							</a>
						</center>
						<br>
						<center>
							<a href="{{ url(Config::get('admin.prefix').'/incidencias/incidencias')  }}" class="btn btn-success" style="width: 100%;">
								<i class="fa fa-plus" aria-hidden="true"></i> 
								Nueva Consulta
							</a>
						</center>
					</div>
				
					
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="row">
	<div class="col-md-3">	
		<div class="list-group">
			<a href="#" class="list-group-item active"><center>Acceso Directo</center></a>
			<a href="{{ url('/') }}" class="list-group-item">
				<i class="fa fa-home" aria-hidden="true"></i> 
				Ir a Pagina Web 
			</a>
			
			<a href="{{ url(Config::get('admin.prefix').'/incidencias/inicio/usuarios#accordion3') }}" class="list-group-item ">
				<i class="fa fa-plus" aria-hidden="true"></i> 
				Consultas
			</a>
			<a href="{{ url(Config::get('admin.prefix').'/incidencias/incidencias') }}" class="list-group-item ">
				<i class="fa fa-plus" aria-hidden="true"></i> 
				Nueva Consulta
			</a>
			<a href="{{ url(Config::get('admin.prefix').'/pagos/pagos') }}" class="list-group-item ">
				<i class="fa fa-plus" aria-hidden="true"></i> 
				Registra tu pago
			</a>
			<a href="{{ url(Config::get('admin.prefix').'/reporte') }}" class="list-group-item ">
				<i class="fa fa-plus" aria-hidden="true"></i> 
				Reporte de Error
			</a>
		</div>
		
	</div>
	<div class="col-md-9">
		<div class="panel-group accordion" id="accordion">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion3" href="#collapse_3">
							<center>
								<center><h2 class="panel-title" style="font-size: 30px;">ELIGE TU PLAN PERSONALIZADO</h2></center>
							</center> 
						</a>
					</h4>
				</div>
				<div id="collapse_3" class="panel-collapse in">
					<div class="panel-body">
						
						<div class="col-sm-12">
							<div class="bs-calltoaction bs-calltoaction-info">
								<div class="row">
									<div class="col-md-9 cta-contents">
										<h1 class="cta-title">Consulta Express </h1>
										<div class="cta-desc">
											<p>
												Este tipo de consulta permite atender cualquier problema digestivo o de salud de tu hijo,  
												la consulta ser?? atendida en el transcurso de 24 h, recibir??s 
												un trato directo, asesor??a VIP, y trato 
												personalizado en cualquier problema 
												digestivo de tu hijo.
												</br></br>Precio:
												</br>30$ USD - Consulta Internacional
												</br>100.000 Bs - Residentes en Venezuela
											</p>
										</div>
									</div>
									<div class="col-md-3 cta-button">
										<a href="#" class="btn btn-lg btn-block btn-default" data-toggle="modal" data-target="#modal_pago1">Adquirir</a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="bs-calltoaction bs-calltoaction-primary">
								<div class="row">
									<div class="col-md-9 cta-contents">
										<h1 class="cta-title">Tu Gastropediatra en Acci??n </h1>
										<div class="cta-desc">
											<p>
												Si tu hijo tiene s??ntomas como v??mito, 
												reflujo,  c??lico, irritabilidad, diarrea, estre??imiento,  
												pujo, erupciones en el cuerpo, trastornos del sue??o, 
												cuadros respiratorios recurrentes, flatulencias,
												sensaci??n de llenura,  dolor abdominal u otra afectaci??n intestinal,
												tu gastropediatra en acci??n tiene la soluci??n para ti.   <b>3 CONSULTAS</b> 
												al mismo paciente que garantizan su mejor??a de 24 a 72 horas y el seguimiento en la primera 
												semana de diagn??stico y tratamiento. 
								
											</p>
											<ol>
												<li> Reconocimiento y evaluaci??n inicial</li>
												<li> Evoluci??n a las 48 Horas </li>
												<li> Seguimiento (7mo dia)</li>
												
											</ol>
											<p>Precio:
												</br>60$ USD - Consulta Internacional
												</br>250.000 Bs - Residentes en Venezuela</p>
										</div>
									</div>
									<div class="col-md-3 cta-button">
										<a href="#" class="btn btn-lg btn-block btn-default" data-toggle="modal" data-target="#modal_pago1">Adquirir</a>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-sm-12">
							<div class="bs-calltoaction bs-calltoaction-success">
								<div class="row">
									<div class="col-md-9 cta-contents">
										<h1 class="cta-title">Consulta 1 &amp; 1</h1>
										<div class="cta-desc">
											<p>
												Siempre tenemos dudas de acuerdo a la 
												dieta de nuestros ni??os y m??s cuando ya 
												ha presentado algunos s??ntomas y tenemos 
												un diagn??stico, pero realmente, ??qu?? 
												puede comer mi hijo? ??que puede comer 
												una madre lactando a un ni??o con 
												intolerancia alimentaria? 
											</p> 
											<p>
												Esta consulta es la respuesta para tus 
												interrogantes en la alimentaci??n del 
												ni??o con intolerancias, alergias alimentarias 
												o sensibilidad al gluten y de la madre que 
												amamanta.
												</br></br>Precio:
												</br>30$ USD - Consulta Internacional
												</br>100.000 Bs - Residentes en Venezuela
											</p>
										</div>
									</div>
									<div class="col-md-3 cta-button">
										<a href="#" class="btn btn-lg btn-block btn-default" data-toggle="modal" data-target="#modal_pago1">Adquirir</a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-12" style="font-size: 18px; text-align: justify;">
							Puedes realizar la consulta desde el lugar donde te encuentres, 
							la distancia ya no es un problema, te brindo esta herramienta 
							digital ideal para solucionar los problemas o inquietudes en 
							temas de gastroenterolog??a infantil. Elige cual de ??stos planes 
							se adaptan m??s a ti.
						</div>
					</div>
				</div>
			</div>
			
			<a href="{{ url('/public/pdf/Gu??a_Pasos_Pdf.pdf') }}" target="_blank" >
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
							<center>
								<table id="tabla1" class="table table-striped table-hover table-bordered tables-text">
									<thead>
										<tr>
											<th style="width: 25%; text-align: center;">Fecha de Solicitud</th>
											<th style="width: 25%; text-align: center;">Tipo de Consulta</th>
											<th style="width: 25%; text-align: center;">Estatus</th>
											<th style="width: 25%; text-align: center;">Fecha cierre</th>
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
