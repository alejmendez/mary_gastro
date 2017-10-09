@extends('pagina::layouts.default')

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
											<img alt="" src="{{ asset('public/img/featured-image-4.jpg') }}"><a class="overlay-link lightbox-image" href="#"><span class="icon flaticon-multimedia"></span></a>
										</figure>
										<div class="caption-box">
											Aprenda como puede cambiar su vida y la salud de su familia con las rutinas de mi programa diario
										</div>
									</div>
								</div>
							</div><!--Text Column -->
							<div class="column text-column col-md-6 col-sm-12 col-xs-12">
								<h2>Mary Gastro Gastropediatra en Acción <a href="#">Gastropediatra... <i>en Acción</i></a></h2>
								<div class="inner-box">
									<div class="text">
										<p>Te acompañare a conocer sobre las enfermedades y padecimientos del aparato digestivo. En especial sobre las famosas intolerancias y alergias alimenticias, como por ejemplo: intolerancia a la lactosa, gluten, enfermedades celiaca, entre otras. Asesorando a los padres para el manejo nutricional adecuado del niño así como del grupo familiar, en la sección de blog encontraras artículos educativos con los cuales podrás obtener una visión más amplia de la afección y como llevar la enfermedad.</p>
										<p>En mi amplia experiencia de pediatra puericultor y docente he tratado numerosos pacientes, en su mayoría hemos logrado una mejoría importante en la detención y combate de la enfermedad, algunos de estos casos de éxitos los puedes ver en la sección de testimoniales.</p>
										<p>Como todos sabemos para tener una vida sana es necesario cambiar malos hábitos, lo cual es un proceso no muy agradable para el paciente, por esto trato de incentivar a las madres y padres a salir de la rutina y dedicarse un tiempo de calidad para la actividad física y su salud, dando así el mejor ejemplo a seguir para sus hijos.</p>

									</div>
									<div class="signature-image"><img alt="" src="{{ asset('public/img/signature.png') }}"></div>
									<div class="about-owner">
										<h4>Dra. Maryraida Canonicco, <span class="designation">Cumlaude en Pediatra – Puericultor <br>Especialista en gastroenterología infantil</span></h4>
										<div class="company-title styled-font">
											MaryGastro
										</div>
									</div>
								</div>
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
								<!--Slide Item-->
								<div class="slide-item">
									<figure class="image-box">
										<a class="lightbox-image" href="{{ asset('public/img/certificate-image-1.jpg') }}" title="Caption Here"><img alt="" src="{{ asset('public/img/certificate-image-1.jpg') }}"></a>
									</figure>
								</div><!--Slide Item-->
								<div class="slide-item">
									<figure class="image-box">
										<a class="lightbox-image" href="{{ asset('public/img/certificate-image-2.jpg') }}" title="Caption Here"><img alt="" src="{{ asset('public/img/certificate-image-2.jpg') }}"></a>
									</figure>
								</div><!--Slide Item-->
								<div class="slide-item">
									<figure class="image-box">
										<a class="lightbox-image" href="{{ asset('public/img/certificate-image-3.jpg') }}" title="Caption Here"><img alt="" src="{{ asset('public/img/certificate-image-3.jpg') }}"></a>
									</figure>
								</div><!--Slide Item-->
								<div class="slide-item">
									<figure class="image-box">
										<a class="lightbox-image" href="{{ asset('public/img/certificate-image-4.jpg') }}" title="Caption Here"><img alt="" src="{{ asset('public/img/certificate-image-4.jpg') }}"></a>
									</figure>
								</div><!--Slide Item-->
								<div class="slide-item">
									<figure class="image-box">
										<a class="lightbox-image" href="{{ asset('public/img/certificate-image-1.jpg') }}" title="Caption Here"><img alt="" src="{{ asset('public/img/certificate-image-1.jpg') }}"></a>
									</figure>
								</div><!--Slide Item-->
								<div class="slide-item">
									<figure class="image-box">
										<a class="lightbox-image" href="{{ asset('public/img/certificate-image-2.jpg') }}" title="Caption Here"><img alt="" src="{{ asset('public/img/certificate-image-2.jpg') }}"></a>
									</figure>
								</div><!--Slide Item-->
								<div class="slide-item">
									<figure class="image-box">
										<a class="lightbox-image" href="{{ asset('public/img/certificate-image-3.jpg') }}" title="Caption Here"><img alt="" src="{{ asset('public/img/certificate-image-3.jpg') }}"></a>
									</figure>
								</div><!--Slide Item-->
								<div class="slide-item">
									<figure class="image-box">
										<a class="lightbox-image" href="{{ asset('public/img/certificate-image-4.jpg') }}" title="Caption Here"><img alt="" src="{{ asset('public/img/certificate-image-4.jpg') }}"></a>
									</figure>
								</div><!--Slide Item-->
								<div class="slide-item">
									<figure class="image-box">
										<a class="lightbox-image" href="{{ asset('public/img/certificate-image-1.jpg') }}" title="Caption Here"><img alt="" src="{{ asset('public/img/certificate-image-1.jpg') }}"></a>
									</figure>
								</div><!--Slide Item-->
								<div class="slide-item">
									<figure class="image-box">
										<a class="lightbox-image" href="{{ asset('public/img/certificate-image-2.jpg') }}" title="Caption Here"><img alt="" src="{{ asset('public/img/certificate-image-2.jpg') }}"></a>
									</figure>
								</div><!--Slide Item-->
								<div class="slide-item">
									<figure class="image-box">
										<a class="lightbox-image" href="{{ asset('public/img/certificate-image-3.jpg') }}" title="Caption Here"><img alt="" src="{{ asset('public/img/certificate-image-3.jpg') }}"></a>
									</figure>
								</div><!--Slide Item-->
								<div class="slide-item">
									<figure class="image-box">
										<a class="lightbox-image" href="{{ asset('public/img/certificate-image-4.jpg') }}" title="Caption Here"><img alt="" src="{{ asset('public/img/certificate-image-4.jpg') }}"></a>
									</figure>
								</div>
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
				<!--Services  Section-->
<section class="services-section">
    <div class="auto-container">
    
        <div class="row clearfix">
                        <!--Default Icon Column-->
            <div class="icon-column-default col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="icon-box"><span class="flaticon-brain"></span></div>
                    <h3>Médico  CUMLAUDE</h3>
                    <div class="text">Apasaionada por el servicio y entrega a mis pacientes</div>
                </div>
            </div>
                        <!--Default Icon Column-->
            <div class="icon-column-default col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="icon-box"><span class="flaticon-medical"></span></div>
                    <h3>Pediatra Puericultor</h3>
                    <div class="text">Especialista y al día con lo nuevo en la medicina moderna.</div>
                </div>
            </div>
                        <!--Default Icon Column-->
            <div class="icon-column-default col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="icon-box"><span class="flaticon-doctor-stethoscope"></span></div>
                    <h3>Gastroenterologa Pediátrica</h3>
                    <div class="text">La buena salud del niño y el adolescente siempre es mi prioridad</div>
                </div>
            </div>
                        <!--Default Icon Column-->
            <div class="icon-column-default col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="icon-box"><span class="flaticon-stretching-exercises"></span></div>
                    <h3>Esposa y Madre</h3>
                    <div class="text">Dios ha permitido la gracia de tener una hermosa familia</div>
                </div>
            </div>
                        <!--Default Icon Column-->
            <div class="icon-column-default col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="icon-box"><span class="flaticon-yoga-sitting-posture-of-a-man"></span></div>
                    <h3>Motivadora 1000%</h3>
                    <div class="text">Soy una mujer luchadora y 1000% positiva, sonriendo a la vida</div>
                </div>
            </div>
                        <!--Default Icon Column-->
            <div class="icon-column-default col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="icon-box"><span class="flaticon-heart-shape-outline-with-lifeline"></span></div>
                    <h3>Asesora de Salud Diaria</h3>
                    <div class="text">Los programas diarios de salud varían dependiendo mi paciente</div>
                </div>
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
				<!--Team Section-->
				<section class="team-section">
					<div class="auto-container">
						<div class="row clearfix">
							<!--Content-column-->
							<div class="content-column col-md-6 col-sm-12 col-xs-12">
								<div class="sec-title">
									<h2>Meet Our Team</h2>
									<div class="separator"></div>
								</div>
								<div class="carousel-outer">
									<!--Team Data Carousel-->
									<div class="team-data-carousel">
										<!--Slide Item-->
										<div class="slide-item">
											<div class="inner-box">
												<div class="info">
													<h3>Astley Fletcher,</h3>
													<div class="designation styled-font">
														CEO and Founder
													</div>
												</div>
												<div class="desc-text">
													Must explain to you how all this mistaken idea of denouncings pleasure and pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder.
												</div>
												<div class="social-links">
													<a href="https://www.facebook.com/"><span class="fa fa fa-facebook"></span></a><a href="https://www.twitter.com/"><span class="fa fa fa-twitter"></span></a><a href="https://www.plus.google.com/"><span class="fa fa fa-google-plus"></span></a><a href="https://www.pinterest.com/"><span class="fa fa fa-pinterest"></span></a>
												</div>
											</div>
										</div>
										<div class="slide-item">
											<div class="inner-box">
												<div class="info">
													<h3>Astley Fletcher,</h3>
													<div class="designation styled-font">
														CEO and Founder
													</div>
												</div>
												<div class="desc-text">
													Must explain to you how all this mistaken idea of denouncings pleasure and pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder.
												</div>
												<div class="social-links">
													<a href="https://www.facebook.com/"><span class="fa fa fa-facebook"></span></a><a href="https://www.twitter.com/"><span class="fa fa fa-twitter"></span></a><a href="https://www.plus.google.com/"><span class="fa fa fa-google-plus"></span></a><a href="https://www.pinterest.com/"><span class="fa fa fa-pinterest"></span></a>
												</div>
											</div>
										</div>
										<div class="slide-item">
											<div class="inner-box">
												<div class="info">
													<h3>Astley Fletcher,</h3>
													<div class="designation styled-font">
														CEO and Founder
													</div>
												</div>
												<div class="desc-text">
													Must explain to you how all this mistaken idea of denouncings pleasure and pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder.
												</div>
												<div class="social-links">
													<a href="https://www.facebook.com/"><span class="fa fa fa-facebook"></span></a><a href="https://www.twitter.com/"><span class="fa fa fa-twitter"></span></a><a href="https://www.plus.google.com/"><span class="fa fa fa-google-plus"></span></a><a href="https://www.pinterest.com/"><span class="fa fa fa-pinterest"></span></a>
												</div>
											</div>
										</div>
										<div class="slide-item">
											<div class="inner-box">
												<div class="info">
													<h3>Astley Fletcher,</h3>
													<div class="designation styled-font">
														CEO and Founder
													</div>
												</div>
												<div class="desc-text">
													Must explain to you how all this mistaken idea of denouncings pleasure and pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder.
												</div>
												<div class="social-links">
													<a href="https://www.facebook.com/"><span class="fa fa fa-facebook"></span></a><a href="https://www.twitter.com/"><span class="fa fa fa-twitter"></span></a><a href="https://www.plus.google.com/"><span class="fa fa fa-google-plus"></span></a>
												</div>
											</div>
										</div>
										<div class="slide-item">
											<div class="inner-box">
												<div class="info">
													<h3>Astley Fletcher,</h3>
													<div class="designation styled-font">
														CEO and Founder
													</div>
												</div>
												<div class="desc-text">
													Must explain to you how all this mistaken idea of denouncings pleasure and pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder.
												</div>
												<div class="social-links">
													<a href="https://www.facebook.com/"><span class="fa fa fa-facebook"></span></a><a href="https://www.twitter.com/"><span class="fa fa fa-twitter"></span></a><a href="https://www.plus.google.com/"><span class="fa fa fa-google-plus"></span></a><a href="https://www.pinterest.com/"><span class="fa fa fa-pinterest"></span></a>
												</div>
											</div>
										</div>
										<div class="slide-item">
											<div class="inner-box">
												<div class="info">
													<h3>Astley Fletcher,</h3>
													<div class="designation styled-font">
														CEO and Founder
													</div>
												</div>
												<div class="desc-text">
													Must explain to you how all this mistaken idea of denouncings pleasure and pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder.
												</div>
												<div class="social-links">
													<a href="https://www.facebook.com/"><span class="fa fa fa-facebook"></span></a><a href="https://www.twitter.com/"><span class="fa fa fa-twitter"></span></a><a href="https://www.plus.google.com/"><span class="fa fa fa-google-plus"></span></a><a href="https://www.pinterest.com/"><span class="fa fa fa-pinterest"></span></a>
												</div>
											</div>
										</div>
										<div class="slide-item">
											<div class="inner-box">
												<div class="info">
													<h3>Astley Fletcher,</h3>
													<div class="designation styled-font">
														CEO and Founder
													</div>
												</div>
												<div class="desc-text">
													Must explain to you how all this mistaken idea of denouncings pleasure and pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder.
												</div>
												<div class="social-links">
													<a href="https://www.facebook.com/"><span class="fa fa fa-facebook"></span></a><a href="https://www.twitter.com/"><span class="fa fa fa-twitter"></span></a><a href="https://www.plus.google.com/"><span class="fa fa fa-google-plus"></span></a><a href="https://www.pinterest.com/"><span class="fa fa fa-pinterest"></span></a>
												</div>
											</div>
										</div>
									</div><!--Team Thumbs Carousel-->
									<div class="team-thumbs-carousel">
										<div class="thumb-item">
											<figure class="thumb-box img-circle">
												<img alt="team-thumb-1" class="img-circle wp-post-image" height="80" sizes="(max-width: 80px) 100vw, 80px" src="{{ asset('public/img/team-thumb-1.jpg') }}" srcset="{{ asset('public/img/team-thumb-1.jpg') }} 80w, {{ asset('public/img/team-thumb-1-75x75.jpg') }} 75w" width="80"> <span class="overlay"></span>
											</figure>
										</div>
										<div class="thumb-item">
											<figure class="thumb-box img-circle">
												<img alt="team-thumb-1" class="img-circle wp-post-image" height="80" sizes="(max-width: 80px) 100vw, 80px" src="{{ asset('public/img/team-thumb-1.jpg') }}" srcset="{{ asset('public/img/team-thumb-1.jpg') }} 80w, {{ asset('public/img/team-thumb-1-75x75.jpg') }} 75w" width="80"><span class="overlay"></span>
											</figure>
										</div>
										<div class="thumb-item">
											<figure class="thumb-box img-circle">
												<img alt="team-thumb-1" class="img-circle wp-post-image" height="80" sizes="(max-width: 80px) 100vw, 80px" src="{{ asset('public/img/team-thumb-1.jpg') }}" srcset="{{ asset('public/img/team-thumb-1.jpg') }} 80w, {{ asset('public/img/team-thumb-1-75x75.jpg') }} 75w" width="80"><span class="overlay"></span>
											</figure>
										</div>
										<div class="thumb-item">
											<figure class="thumb-box img-circle">
												<img alt="team-thumb-1" class="img-circle wp-post-image" height="80" sizes="(max-width: 80px) 100vw, 80px" src="{{ asset('public/img/team-thumb-1.jpg') }}" srcset="{{ asset('public/img/team-thumb-1.jpg') }} 80w, {{ asset('public/img/team-thumb-1-75x75.jpg') }} 75w" width="80"><span class="overlay"></span>
											</figure>
										</div>
										<div class="thumb-item">
											<figure class="thumb-box img-circle">
												<img alt="team-thumb-1" class="img-circle wp-post-image" height="80" sizes="(max-width: 80px) 100vw, 80px" src="{{ asset('public/img/team-thumb-1.jpg') }}" srcset="{{ asset('public/img/team-thumb-1.jpg') }} 80w, {{ asset('public/img/team-thumb-1-75x75.jpg') }} 75w" width="80"><span class="overlay"></span>
											</figure>
										</div>
										<div class="thumb-item">
											<figure class="thumb-box img-circle">
												<img alt="team-thumb-1" class="img-circle wp-post-image" height="80" sizes="(max-width: 80px) 100vw, 80px" src="{{ asset('public/img/team-thumb-1.jpg') }}" srcset="{{ asset('public/img/team-thumb-1.jpg') }} 80w, {{ asset('public/img/team-thumb-1-75x75.jpg') }} 75w" width="80"><span class="overlay"></span>
											</figure>
										</div>
										<div class="thumb-item">
											<figure class="thumb-box img-circle">
												<img alt="team-thumb-1" class="img-circle wp-post-image" height="80" sizes="(max-width: 80px) 100vw, 80px" src="{{ asset('public/img/team-thumb-1.jpg') }}" srcset="{{ asset('public/img/team-thumb-1.jpg') }} 80w, {{ asset('public/img/team-thumb-1-75x75.jpg') }} 75w" width="80"><span class="overlay"></span>
											</figure>
										</div>
									</div>
								</div>
							</div><!--Image-column-->
							<div class="image-column col-md-6 col-sm-12 col-xs-12">
								<figure class="image-box wow slideInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
									<img alt="" src="{{ asset('public/img/team-image-1.png') }}">
								</figure>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
	

@endsection