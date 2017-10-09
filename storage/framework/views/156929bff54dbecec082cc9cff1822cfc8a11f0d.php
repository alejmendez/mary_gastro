<!DOCTYPE html>
<!--[if IE 8]>    <html lang="es" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>    <html lang="es" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--><html lang="es"><!--<![endif]-->
<head>
	<?php echo $__env->make('pagina::partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body class="size-1140">
	<?php echo $__env->make('pagina::partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<section>
		<?php echo $__env->yieldContent('content'); ?>
	</section>
	
	<?php echo $__env->make('pagina::partials.page-footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php echo $__env->make('pagina::partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>