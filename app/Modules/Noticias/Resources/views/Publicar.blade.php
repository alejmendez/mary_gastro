@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
    @include('base::partials.botonera')

    @include('base::partials.ubicacion', ['ubicacion' => ['Noticias']])

    @include('base::partials.modal-busqueda', [
        'titulo' => 'Buscar Noticias.',
        'columnas' => [
            'titulo' => '40',
    		'resumen' => '60',

        ]
    ])
@endsection

@section('content')
    <div class="row">
        {!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST']) !!}
            {{ Form::bsText('published_at', '', [
                'label' => 'Fecha',
                'placeholder' => 'Fecha de Publicaci&oacute;n'
            ]) }}

            <div class="form-group col-xs-12">
                <label for="titulo">Titulo</label>
                <div id="titulo" class="form-control col-xs-12"></div>
            </div>

            <div class="form-group col-xs-12">
                <label for="resumen">Resumen</label>
                <div id="resumen" class="form-control col-xs-12"></div>
            </div>

            <div class="form-group col-xs-12">
                <label for="contenido_html">Contenido</label>
                <div id="contenido_html" class="col-xs-12"></div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
