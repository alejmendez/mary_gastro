<?php
$controller = app('marygastro\Modules\Base\Http\Controllers\Controller');
$controller->css[] = 'login.min.css';
$controller->js[] = 'login.js';

$data = $controller->_app();
extract($data);

$html['titulo'] = 'Inicio de Sesión';
?>
<!DOCTYPE html>
<!--[if IE 8]>    <html lang="es" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>    <html lang="es" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--><html lang="es"><!--<![endif]-->
<head>
	@include('base::partials.head')
</head><!--/head-->

	<body class="login">
		<div class="logo">
			<a href="{{ url(\Config::get('admin.prefix')) }}">
				<img src="{{ asset('img/logos/253x123/' . $controller->conf('login_logo')) }}" alt="Logo" />
			</a>
		</div>
		<div class="content">
			{!! Form::open(array('id' => 'formulario', 'url' => 'login')) !!}
				<h3 class="form-title font-green">{{$controller->conf('nombre')}}</h3>
				
				<div class="form-group">
					<label class="control-label visible-ie8 visible-ie9">{{ Lang::get('login.user') }}</label>
					{!! Form::text('nombre', '', ['class' => 'form-control form-control-solid placeholder-no-fix user', 'autocomplete' => 'off', 'placeholder' => Lang::get('login.user')]) !!}
				</div>

				<div class="form-group">
					<label class="control-label visible-ie8 visible-ie9">{{ Lang::get('login.password') }}</label>
					{!! Form::password('password', ['class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => Lang::get('login.password')]) !!}
				</div>

				
				<br>
				<label class="rememberme check mt-checkbox mt-checkbox-outline">
					{!! Form::checkbox('recordar', '1', false) !!}
					{{ Lang::get('login.remember_me') }}
					<span></span>
				</label>
				 <a href="javascript:;" id="forget-password" class="forget-password">Recuperar Contraseña?</a>
				<div class="form-actions" style="text-align: center;">
					{!! Form::button(Lang::get('login.log_in'), ['class' => 'btn green uppercase']) !!}
				</div>
				<div class="create-account">
                    <p>
                        <a href="{{ url(\Config::get('admin.prefix').'/registro') }}" id="register-btn" class="uppercase">Crear Cuenta</a>
                    </p>
                </div>
			
					<!-- 	
						Desarrollado por:  
						Alejandro Mendez alejmendez.87@gmail.com 	
					-->
			{!! Form::close() !!}
		</div>
		<script type="text/javascript" charset="utf-8" async defer>
		var ruta= "{{ asset('public/img/usuarios') }}";
		</script>
		
		@include('base::partials.footer')
	</body>
</html>