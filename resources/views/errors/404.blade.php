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
@extends('pagina::layouts.default')

@section('content')
<div class="row">
	<div class="col-md-7 col-sm-12 contenido">
		<h3>Error 404</h3>
		No hemos encontrado lo solicitado, puede regresar a la pagina inicial haciendo click <a href="{{ url('/') }}">aqui</a>.
	</div>
</div>
@endsection