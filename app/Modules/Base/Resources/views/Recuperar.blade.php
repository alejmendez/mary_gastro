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
			<div id="registro">
				{!! Form::open(array('url' => route('login.recuperar', $code), 'method' => 'POST')) !!}
                    <h3 class="font-green">Cambio de Clave</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">Contraseña</label>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="password" placeholder="Contraseña" name="password" />
                    </div>
					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">Repita su Contraseña</label>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Repita su Contraseña"  id="password_confirmation" name="password_confirmation" />
                    </div>

					<div class="form-actions">
						<button type="submit" id="recuperar-submit-btn" class="btn btn-success uppercase pull-right">Guardar</button>
					</div>
					<h6 class="form-title font-red">IMPORTANTE: Su contraseña debe incluir al menos 4 carácteres.</h6>
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