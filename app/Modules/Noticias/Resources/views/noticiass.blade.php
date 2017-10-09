@extends('base::layouts.default')

@section('content-top')

  @include('base::partials.botonera')

  @include('view')

@include('base::partials.modal-busqueda', [
  'titulo' => 'Buscar las Noticias',
  'columnas' => [
    'marygastro Usuarios' => '12.5',
    'Titulo' => '12.5',
    'Contenido' => '12.5',
    'Contenido Html' => '12.5',
    'Resumen' => '12.5',
    'Audio' => '12.5',
    'Published At' => '12.5'
  ]
])
@endsection

@section('content')

  <div class="row">
    {!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST']) !!}
      {!! $noticias->generate() !!}
    {!! Form::close() !!}
  </div>

@endsection

@stop
