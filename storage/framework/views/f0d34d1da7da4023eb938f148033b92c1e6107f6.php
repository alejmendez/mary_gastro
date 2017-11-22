<?php
$controller = app('marygastro\Modules\Pagina\Http\Controllers\Controller');
$controller->css[] = '404.css';

$data = $controller->_app();

extract($data);

$html['titulo'] = 'Pagina no Encontrada';
if (is_null($usuario)){
	$usuario = (object) [
		'id' 		=> 0,
		'usuario' 	=> 'user.png',
		'nombre' 	=> 'Invitado',
		'apellido' 	=> '',
		'super'		=> 'n',
		'foto'      => 'user.jpg'
	];
}
?>


<?php $__env->startSection('content'); ?>
<section class="page-title" style="background-image:url('http://asianitbd.com/wp/healthcoach/wp-content/themes/healthcoach/images/background/bg-page-title-1.jpg');">
    <div class="auto-container">
        <h1>404 Error Page</h1>
    </div>
</section>
<div class="error_page container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  <!-- /.shop aside use for styling input search box -->
            <div class="page-error">
                <p>
					La página que estás buscando ya no existe. 
					Tal vez pueda regresar a la página principal de los sitios y ver 
					si puede encontrar lo que está buscando. O bien, puede intentar 
					encontrarlo con la información a continuación.
				</p>
                <a href="http://asianitbd.com/wp/healthcoach/" class="theme-btn btn-style-one error-btn">Regresar a Inicio </a>
        	</div>
        </div>
	</div> <!-- /row -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pagina::layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>