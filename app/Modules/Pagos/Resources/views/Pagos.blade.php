@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
    @include('base::partials.botonera')
    
    @include('base::partials.ubicacion', ['ubicacion' => ['Pagos']])
    
    @include('base::partials.modal-busqueda', [
        'titulo' => 'Buscar Pagos.',
        'columnas' => [
            'Usuario' => '10',
		'Banco Emisor' => '10',
		'Banco Receptor' => '10',
		'Tipo Deposito' => '10',
		'Cod Referencia' => '10',
		'Planes' => '10',
		'Url' => '10',
		'Fecha' => '10',
		'Estatus' => '10',
		'Monto' => '10'
        ]
    ])
@endsection

@section('content')
    <div class="row">
        {!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST' ]) !!}
            {!! $Pagos->generate() !!}
        {!! Form::close() !!}
    </div>
@endsection