	<?php 
        $_notificaciones = $controller->vernotificaciones();
        $notificaciones = $_notificaciones['notificaciones'];
        
    ?>
    
    <div class="page-header">
		<!-- BEGIN HEADER TOP -->
		<div class="page-header-top">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<div class="page-logo">
					<a href="{{ url('/') }}">
						<img src="{{ asset('img/logos/168x68/' . $controller->conf('logo')) }}" alt="logo" class="logo-default" />
					</a>
				</div>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="menu-toggler"></a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
	                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
	                            <span class="circle">{{$_notificaciones['contador']}}</span>
	                            <span class="corner"></span>
	                        </a>
	                        <ul class="dropdown-menu">
	                            <li class="external">
	                                <h3>Tienes <strong>{{$_notificaciones['contador']}} Nuevas</strong> Notificaciones</h3>
	                               	{{--  <a href="app_inbox.html">Ver todas</a> --}}
	                            </li>
	                            <li>
	                                <ul class="dropdown-menu-list scroller" style="height: 400px; overflow:auto;" data-handle-color="#637283">

	                                	@foreach($notificaciones as $notificacion)

		                                	<li>
												@if($notificacion->operacion_id != null)
												   <a data-id = "{{$notificacion->id}}" class="notifi" href="{{url(Config::get('admin.prefix').'/'.$notificacion->TipoNotificacion->ruta.'/'.$notificacion->operacion_id)}} ">  
												
												@else
													<a data-id = "{{$notificacion->id}}" class="notifi" href="{{url(Config::get('admin.prefix').'/'.$notificacion->TipoNotificacion->ruta)}} ">  
												
												@endif
													<span class="photo">
														{{--  @if(is_file('public/img/usuarios/' .$notificacion->foto_enviado))
															<img src="{{url('public/img/usuarios/'.$notificacion->foto_enviado)}}" class="img-circle">
														@else
														@endif    --}}
															<img alt="" class="img-circle" src="{{ url('img/usuarios/40x40/user.png') }}">
													</span>
													@if($notificacion->visto == 0)
														<span class="subject">
															<span class="from"><u><b>{{$notificacion->enviado()}}</b></u></span>
															<span class="time"></span>
														</span>
															<span class="message"><b>{{$notificacion->mensaje->mensaje}}</b></span>
													@else
														<span class="subject">
															<span class="from">{{$notificacion->enviado()}}</span>
															<span class="time"></span>
														</span>
															<span class="message">{{$notificacion->mensaje->mensaje}}</span>
													@endif  
												</a>
		                                    </li>
	                                	@endforeach
	                                </ul>
	                            </li>
	                        </ul>
	                    </li>
    
						<li class="dropdown dropdown-user dropdown-dark">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								@if(is_file('public/img/usuarios/' . $usuario->personas->foto))
									<img alt="" class="img-circle" src="{{ url('img/usuarios/40x40/' . $usuario->personas->foto) }}">
								@else
									<img alt="" class="img-circle" src="{{ url('img/usuarios/40x40/user.png') }}">
								@endif
								<span class="username username-hide-mobile">{{ $usuario->personas->nombres }}</span>
							</a>
							@if($usuario->id > 0)
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="{{ url(Config::get('admin.prefix').'/perfil') }}">
										<i class="fa fa-user"></i> Mi Perfil
									</a>
								</li>
								<li>
									<a href="{{ url(Config::get('admin.prefix').'/reporte') }}">
										<i class="fa fa-exclamation-circle"></i> Reportar Error
									</a>
								</li>
								<li class="divider"> </li>
								<li>
									<a href="{{ url(Config::get('admin.prefix').'/login/salir') }}">
										<i class="icon-logout"></i> Salir
									</a>
								</li>
							</ul>
							@endif
						</li>
						<!-- END USER LOGIN DROPDOWN -->
						<!-- BEGIN QUICK SIDEBAR TOGGLER -->
						<li class="">
							<a href="{{ url(Config::get('admin.prefix').'/login/salir') }}">
								<span class="sr-only">Salir</span>
								<i class="icon-logout"></i> 
							</a>
						</li>
						<!-- END QUICK SIDEBAR TOGGLER -->
					</ul>
				</div>
				<!-- END TOP NAVIGATION MENU -->
			</div>
		</div>
		<!-- END HEADER TOP -->
		@include('base::partials.menu')
	</div>