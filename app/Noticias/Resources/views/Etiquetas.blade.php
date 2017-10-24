@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
    @include('base::partials.botonera')

    @include('base::partials.ubicacion', ['ubicacion' => ['Etiquetas']])

    @include('base::partials.modal-busqueda', [
        'titulo' => 'Buscar Etiquetas.',
        'columnas' => [
            'Nombre' => '60',
		    'Slug' => '40'
        ]
    ])
@endsection

@section('content')
    <div class="row">
        {!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST' ]) !!}
            {!! $Etiquetas->generate() !!}
        {!! Form::close() !!}
    </div>
@endsection
