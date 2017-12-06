@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
    @include('base::partials.botonera')
    
    @include('base::partials.ubicacion', ['ubicacion' => ['Testimonios']])
    
    @include('base::partials.modal-busqueda', [
        'titulo' => 'Buscar Testimonios.',
        'columnas' => [
            'Titulo' => '33.333333333333',
		'Descripcion' => '33.333333333333',
		'Imagen' => '33.333333333333'
        ]
    ])
@endsection

@section('content')
    <div class="row">
        {!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST' ]) !!}
            {!! $Testimonios->generate() !!}
        {!! Form::close() !!}
    </div>
@endsection