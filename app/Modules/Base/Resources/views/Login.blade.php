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
			<div id="login"> 
				{!! Form::open(array('id' => 'formulario', 'url' => 'login')) !!}
					<h3 class="form-title font-green">Iniciar Sesión</h3>
					
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
					<a href="javascript:;" id="forget-password" class="forget-password">¿Recuperar Contraseña?</a>
					<div class="form-actions" style="text-align: center;">
						{!! Form::button(Lang::get('login.log_in'), ['class' => 'btn green uppercase']) !!}
					</div>
					<h6 class="form-title font-red">Nota: Sólo podrá Iniciar Sesión una vez creada la cuenta.</h6>

					<div class="create-account">
						<p>
							<a href="javascript:;"  id="register-btn" class="uppercase">Crea Una Cuenta Gratis</a>
						</p>
						
					</div>
				
				
					<!-- 	
						Desarrollado por:  
						Alejandro Mendez alejmendez.87@gmail.com 
						Miguelangel Gutierrez Drummermiguelangel@gmail.com	
					-->
				{!! Form::close() !!}
			</div>
			<div id="registro" style="display: none;">
				{!! Form::open(array('id' => 'formulario2')) !!}
					<h3 class="font-green">Nuevo Usuario</h3>
					<p class="hint"> </p>
					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">N° Cedula</label>
						<input class="form-control placeholder-no-fix" type="text" placeholder="N° Cedula" name="dni" /> 
					</div>
					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">Nombres y Apellidos</label>
						<input class="form-control placeholder-no-fix" type="text" placeholder="Nombres y Apellidos" name="nombres" /> 
					</div>
					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">Correo</label>
						<input class="form-control placeholder-no-fix" type="text" placeholder="Correo" name="correo" /> 
					</div>
					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">Contraseña</label>
						<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Contraseña" name="password" /> </div>
					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">Repita su Contraseña</label>
						<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Repita su Contraseña"  id="rpassword" name="rpassword" /> </div>
					
					<div class="form-actions">
						<button type="button" id="register-back-btn" class="register-back-btn btn green btn-outline">Atras</button>
						<button type="button" id="register-submit-btn" class="btn btn-success uppercase pull-right">Registrar</button>
					</div>
					<h6 class="form-title font-red">IMPORTANTE: Su contraseña debe incluir al menos 8 carácteres, entre ellos una letra mayúscula, una letra minúscula y un número.</h6>
				{!! Form::close() !!}
			</div>
			<div id="recuperar" style="display: none;">
				{!! Form::open(array('id' => 'formulario3')) !!}
					<h3 class="font-green">Recuperar Contraseña</h3>
					<p class="hint"> </p>
					
					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">Correo</label>
						<input class="form-control placeholder-no-fix" type="text" placeholder="Correo" name="correo" /> 
					</div>
				
					<div class="form-actions">
						<button type="button" id="register-back-btn" class="register-back-btn btn green btn-outline ">Atras</button>
						<button type="button" id="register-submit-btn" class="btn btn-success uppercase pull-right">Registrar</button>
					</div>
				{!! Form::close() !!}
			</div>
			<div id="reportar" style="display: none;">
				{!! Form::open(array('id' => 'formulario4')) !!}
					<h3 class="font-green">Reportar error</h3>
					<p class="hint"> </p>
					
					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">Nombres y Apellidos</label>
						<input class="form-control placeholder-no-fix" type="text" placeholder="Nombres y Apellidos" name="nombres" /> 
					</div>

					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">Correo</label>
						<input class="form-control placeholder-no-fix" type="text" placeholder="Correo" name="correo" /> 
					</div>

					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">Descripcion</label>
						 <textarea class="form-control" placeholder="Descripcion" name="descripcion"></textarea>
					</div>
				
					<div class="form-actions">
						<button type="button" id="report-back-btn" class="register-back-btn btn green btn-outline ">Atras</button>
						<button type="button" id="report-submit-btn" class="btn btn-success uppercase pull-right">Enviar</button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
		<div class="copyright">
		 	<a href="javascript:;"  id="report-btn" class="forget-password">Reporte de Error</a><br>
		 	MaryGastro © 2017 por <a href="http://www.tumundoclick.com/" class="author-name">www.tumundoclick.com</a>
		</div>
	
		@include('base::partials.footer')
	</body>
</html>