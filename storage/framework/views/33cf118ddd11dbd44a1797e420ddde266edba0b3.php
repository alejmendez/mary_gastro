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
	<?php echo $__env->make('base::partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head><!--/head-->
	<body class="login">
		<div class="logo">
			<a href="<?php echo e(url(\Config::get('admin.prefix'))); ?>">
				<img src="<?php echo e(asset('img/logos/253x123/' . $controller->conf('login_logo'))); ?>" alt="Logo" />
			</a>
		</div>
		<div class="content">
			<div id="login"> 
				<?php echo Form::open(array('id' => 'formulario', 'url' => 'login')); ?>

					<h3 class="form-title font-green">Iniciar sesión</h3>
					
					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9"><?php echo e(Lang::get('login.user')); ?></label>
						<?php echo Form::text('nombre', '', ['class' => 'form-control form-control-solid placeholder-no-fix user', 'autocomplete' => 'off', 'placeholder' => Lang::get('login.user')]); ?>

					</div>

					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9"><?php echo e(Lang::get('login.password')); ?></label>
						<?php echo Form::password('password', ['class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => Lang::get('login.password')]); ?>

					</div>

					<br>
					<label class="rememberme check mt-checkbox mt-checkbox-outline">
						<?php echo Form::checkbox('recordar', '1', false); ?>

						<?php echo e(Lang::get('login.remember_me')); ?>

						<span></span>
					</label>
					<a href="javascript:;" id="forget-password" class="forget-password">Recuperar Contraseña?</a>
					<div class="form-actions" style="text-align: center;">
						<?php echo Form::button(Lang::get('login.log_in'), ['class' => 'btn green uppercase']); ?>

					</div>
					<div class="create-account">
						<p>
							<a href="javascript:;"  id="register-btn" class="uppercase">Crear Cuenta</a>
						</p>
					</div>
				
					<!-- 	
						Desarrollado por:  
						Alejandro Mendez alejmendez.87@gmail.com 
						Miguelangel Gutierrez Drummermiguelangel@gmail.com	
					-->
				<?php echo Form::close(); ?>

			</div>
			<div id="registro" style="display: none;">
				<?php echo Form::open(array('id' => 'formulario2')); ?>

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
						<button type="button" id="register-back-btn" class="register-back-btn btn green btn-outline">Back</button>
						<button type="button" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
					</div>
				<?php echo Form::close(); ?>

			</div>
			<div id="recuperar" style="display: none;">
				<?php echo Form::open(array('id' => 'formulario3')); ?>

					<h3 class="font-green">Nuevo Usuario</h3>
					<p class="hint"> </p>
					
					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">Correo</label>
						<input class="form-control placeholder-no-fix" type="text" placeholder="Correo" name="correo" /> 
					</div>
				
					<div class="form-actions">
						<button type="button" id="register-back-btn" class="register-back-btn btn green btn-outline ">Back</button>
						<button type="button" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
					</div>
				<?php echo Form::close(); ?>

			</div>
			
		</div>
		 <div class="copyright">MaryGastro © 2017 por <a href="http://www.tumundoclick.com/" class="author-name">www.tumundoclick.com</a></div>
	
		<?php echo $__env->make('base::partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</body>
</html>