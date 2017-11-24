@extends('pagina::layouts.default')

@push('css')
<style>
p {
	text-align: justify;
}
</style>
@endpush

@section('content')
    
<section class="page-title" style="background-image:url('public/img/bg-page-title-1.jpg');">
	<div class="auto-container">
		<h1>Mary Gastro</h1>
		<h3 class="styled-font">GastroPediatra en Acción</h3>
	</div>
</section><!--Page Info-->
<section class="page-info">
	<div class="auto-container clearfix">
		<div class="breadcrumb-outer">
			<ul class="bread-crumb clearfix">
				<li>
					<a href="{{ url('/') }}">Inicio</a>
				</li>
				<li>¿Quién es Mary Gastro?</li>
			</ul>
		</div>
	</div>
</section>
<div class="vc_row wpb_row vc_row-fluid">
	<div class="wpb_column vc_column_container vc_col-sm-12">
		<div class="vc_column-inner">
			<div class="wpb_wrapper">
				<!--Default Section-->
				<section class="default-section">
					<div class="auto-container">
						<div class="row clearfix">
							<!--Video Column-->
							<div class="column video-column col-md-6 col-sm-12 col-xs-12">
								<div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
									<!--featured-image-box-->
									<div class="video-image-box">
										<figure class="image">
											<img alt="Disfruto los momentos que comparto con mis pacientes" src="{{ asset('public/img/featured2.jpg') }}">
										</figure>
										<div class="caption-box">
											Motivadora al 1000% con energía positiva que incentiva a tener un estilo de vida saludable con un enfoque integral (físico y emocional)
										</div>
									</div>
								</div>
							</div><!--Text Column -->
							<div class="column text-column col-md-6 col-sm-12 col-xs-12">
								<h2>¿Quién es Mary_gastro?</a></h2>
								<div class="inner-box">
									<div class="text">
										<p>Soy doctora y madre de 3 príncipes Isabel, Mauricio y Francisco. Me apasiona la danza en todas sus expresiones, desde los 4 años descubrí  que la música corre por mis venas y mi cuerpo expresa al compás de ella mis emociones más profundas. Amo cada cosa que hago, disfruto los momentos que comparto con mis pacientes y sus padres, con mis seres queridos y esos minutos que me dedico a mí misma para drenar las emociones del día a día y construir una vida maravillosa.</p>
									</div>
									<div class="signature-image"><img alt="" src="{{ asset('public/img/signature.png') }}"></div>
									<div class="about-owner">
										<h4>Dra. Maryraida Canónicco, <span class="designation">Médico Cirujano Mención Honorífica CUMLAUDE, Pediatra, Puericultor <br>Especialista en gastroenterología infantil</span></h4>
										<div class="company-title styled-font">
											MaryGastro
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="testimonials-section">
					<div class="auto-container">
						<div class="row clearfix">
							<div class="column text-column col-md-6 col-sm-12 col-xs-12">
								<h2>¿Que problema resuelvo?</a></h2>
								<div class="inner-box">
									<div class="text">
										<p>Todas las enfermedades del aparato digestivo del niño y adolescente. En especial las Intolerancias y alergias alimentarias (como por ejemplo a la leche de vaca, al gluten o mixtas) o la enfermedad celiaca, las cuales no se diagnostican oportunamente y generan problemas diversos como dolor abdominal, estreñimiento o diarrea, vómito o reflujo gastroesofagico, distensión abdominal, flatulencias,  manifestaciones en piel como dermatitis o respiratorias inclusive que afectan al niño y también la calidad de vida de sus padres.</p>
										<p>Ayudo a superar las Intolerancias/alergias  alimentarias y asesoro a los padres para el manejo nutricional adecuado del niño así como del grupo familiar.</p>
										<p>Incentivo a las madres y padres a salir de la rutina y dedicarse un tiempo de calidad para la actividad física y su salud,dando así el mejor ejemplo a seguir para sus hijos.</p><br>
										<h2>Solución</h2>
										<p>Mis clientes obtienen respuesta a sus inquietudes en lo que respecta no sólo a los síntomas sino al desarrollo óptimo físico y mental de sus hijos y a alcanzar un estilo de vida y de alimentación que permita superar sus patologías o enfermedades a la brevedad posible.</p>
									</div>
								</div>
							</div>

							<!--Video Column-->
							<div class="column video-column col-md-6 col-sm-12 col-xs-12">
								<div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
									<!--featured-image-box-->
									<div class="video-image-box">
										<figure class="image">
											<img alt="" src="{{ asset('public/img/team-image-1.png') }}" style="max-width: 300px;">
										</figure>
										<div class="caption-box">
											Aprenda como puede cambiar su vida y la salud de su familia con las rutinas de mi programa diario
										</div>
									</div>
								</div>
							</div><!--Text Column -->
						</div><!--end seccion -->
					</div>
				</section>			
			</div>
		</div>
	</div>
</div>

<div class="vc_row wpb_row vc_row-fluid">
	<div class="wpb_column vc_column_container vc_col-sm-12">
		<div class="vc_column-inner">
			<div class="wpb_wrapper">
				<!--Team Section-->
				<section class="team-section">
					<div class="auto-container">
						<div class="row clearfix">
							<!--Content-column-->
							<div class="content-column col-md-8 col-sm-12 col-xs-12">
								<div class="sec-title">
									<h2>Beneficios</h2>
									<div class="separator"></div>
								</div>
								<div class="carousel-outer">
									<!--Team Data Carousel-->
									<div class="team-data-carousel">
										<!--Slide Item-->
										<div class="slide-item">
											<div class="inner-box">
												<div class="info">
													<h3>Intolerancias - alergias alimentarias</h3>
													<div class="designation styled-font">
														Asesoría especializada
													</div>
												</div>
												<div class="desc-text" style="font-size:18px;">
													 En niños y adolescentes así como problemas de salud recurrentes y alteraciones gastrointestinales en especial peso estacionario (poca ganancia de peso) desnutrición, sobrepeso, obesidad, alimentación  en casos de espectro autista.
												</div>
											</div>
										</div>
										<div class="slide-item">
											<div class="inner-box">
												<div class="info">
													<h3>Apoyo Familiar</h3>
													<div class="designation styled-font">
														Nutrición
													</div>
												</div>
												<div class="desc-text" style="font-size:18px;">
													Servir de apoyo a padres en cuanto al manejo nutricional de los niños con enfermedades gastrointestinales.
												</div>
											</div>
										</div>
										<div class="slide-item">
											<div class="inner-box">
												<div class="info">
													<h3>Motivación</h3>
													<div class="designation styled-font">
														Equilibrio
													</div>
												</div>
												<div class="desc-text" style="font-size:18px;">
													Motivar a las madres a  disfrutar una vida activa con equilibrio entre su rol en la familia y las actividades que desee desempeñar como mujer, sirviendo de ejemplo además para sus hijos en una visión integral.
												</div>
											</div>
										</div>

									</div><!--Team Thumbs Carousel-->
									<div class="team-thumbs-carousel">
										
									</div>
								</div>
							</div><!--Image-column-->
							<div class="image-column col-md-4 col-sm-12 col-xs-12">
								<figure class="image-box wow slideInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
									<img alt="" src="{{ asset('public/img/featured-image-8.jpg') }}?_=1">
								</figure>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>

<div class="vc_row wpb_row vc_row-fluid">
	<div class="wpb_column vc_column_container vc_col-sm-12">
		<div class="vc_column-inner">
			<div class="wpb_wrapper">
				<!--Certificates Section-->
				<section class="certificates-section">
					<div class="auto-container">
						<div class="sec-title centered">
							<h2>Certificados</h2>
							<div class="separator"></div>
						</div>
						<div class="carousel-outer">
							<div class="certificates-carousel">
								@for($i=1;$i<=34;$i++)
								<div class="slide-item">
									<figure class="image-box">
										<img alt="" src="{{ asset('public/img/certificate-image-'.$i.'.jpg') }}">
									</figure>
								</div>
								@endfor
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<div class="vc_row wpb_row vc_row-fluid">
	<div class="wpb_column vc_column_container vc_col-sm-12">
		<div class="vc_column-inner">
			<div class="wpb_wrapper">
				<!--Why Choose Us  Section-->
			</div>
		</div>
	</div>
</div>

	

@endsection