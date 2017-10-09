@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
    @include('base::partials.botonera')

    @include('base::partials.ubicacion', ['ubicacion' => ['Noticias']])

    @include('base::partials.modal-busqueda', [
        'titulo' => 'Buscar Noticias.',
        'columnas' => [
            'id' => '33.3',
    		'Titulo' => '33.3',
    		'Resumen' => '33.3',
        ]
    ])
@endsection

@section('content')
    {!! Form::open(['id'=>'formulario', 'name'=>'formulario', 'method'=>'POST'])!!}
        {!! $Categorias->generate() !!}
    {!! Form::close() !!}
@endsection
