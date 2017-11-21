<?php
$controller = app('marygastro\Modules\Pagina\Http\Controllers\Controller');
$controller->css[] = '404.css';

$data = $controller->_app();
extract($data);

$html['titulo'] = 'Servicio no disponible';
$html['css'][] = '404.css';

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

@extends('base::layouts.default')
@section('content')
<section class="page-title" style="background-image:url('http://asianitbd.com/wp/healthcoach/wp-content/themes/healthcoach/images/background/bg-page-title-1.jpg');">
    <div class="auto-container">
        <h1>503 Error Page</h1>
    </div>
</section>
<div class="error_page container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  <!-- /.shop aside use for styling input search box -->
            <div class="page-error">
                <p>
					Servicio no disponible.
				</p>
				<p>
                	Intenta acceder m&aacute;s tarde.
				</p>
        	</div>
        </div>
	</div> <!-- /row -->
</div>
@endsection