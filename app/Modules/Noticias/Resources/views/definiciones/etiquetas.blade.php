@extends('base::layouts.default')
@section('content')
	@include('base::partials.botonera')

	{{ Form::bsModalBusqueda([
		'Nombre' => '30',
		'Slug' => '30',
		'Descripcion' => '40'
	]) }}

	<ul class="page-breadcrumb breadcrumb">
		<li>
			<a href="{{ url('/') }}">Inicio</a><i class="fa fa-circle"></i>
		</li>
		<li>
			<span>Definiciones</span>
		</li>
		<li>
			<span>Etiquetas</span>
		</li>
	</ul>

	<div class="row">
		{!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST']) !!}
			{{ Form::bsText('nombre', '', [
				'label' 		=> 'Nombre',
				'placeholder' 	=> 'Nombre',
				'required' 		=> 'required'
			]) }}
			{{ Form::bsText('slug', '', [
				'label' 		=> 'Slug',
				'placeholder' 	=> 'Slug',
				'required' 		=> 'required'
			]) }}
			{{ Form::bsText('descripcion', '', [
				'label' 		=> 'Descripción',
				'placeholder' 	=> 'Descripción',
				'required' 		=> 'required'
			]) }}
		{!! Form::close() !!}
	</div>
@endsection
