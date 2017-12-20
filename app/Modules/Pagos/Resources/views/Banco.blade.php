@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
    @include('base::partials.botonera')
    
    @include('base::partials.ubicacion', ['ubicacion' => ['Banco']])
    
    @include('base::partials.modal-busqueda', [
        'titulo' => 'Buscar Banco.',
        'columnas' => [
            'Nombre Banco' => '100'
        ]
    ])
@endsection

@section('content')
    <div class="row">
        {!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST' ]) !!}
            {!! $Banco->generate() !!}
        {!! Form::close() !!}
    </div>
@endsection