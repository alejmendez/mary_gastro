@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
    @include('base::partials.botonera')
    
    @include('base::partials.ubicacion', ['ubicacion' => ['Testimonios']])
    
    @include('base::partials.modal-busqueda', [
        'titulo' => 'Buscar Testimonios.',
        'columnas' => [
            'Titulo' => '50',
		    'Descripcion' => '50'
        ]
    ])
@endsection

@section('content')
    <div class="row">
        {!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST' ]) !!}
            {!! $Testimonios->generate() !!}

            <div class="form-group col-xs-12">
                <label for="contenido_html">Descripción </label>
                <textarea placeholder="Contenido" id="editor" class="form-control" required="required"></textarea>
            </div>

        {!! Form::close() !!}
    </div>
@endsection