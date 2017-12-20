@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
    @include('base::partials.botonera')
    
    @include('base::partials.ubicacion', ['ubicacion' => ['Planes']])
    
    @include('base::partials.modal-busqueda', [
        'titulo' => 'Buscar Planes.',
        'columnas' => [
            'Nombre' => '100'
        ]
    ])
@endsection

@section('content')
    <div class="row">
        {!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST' ]) !!}
            {!! $Planes->generate() !!}
        {!! Form::close() !!}
    </div>
@endsection