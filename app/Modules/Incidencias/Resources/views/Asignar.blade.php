@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
    @include('base::partials.botonera')
    
    @include('base::partials.ubicacion', ['ubicacion' => ['Asignar']])
@endsection

@section('content')
    <div class="row">
        {!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST' ]) !!}
            {{ Form::bsSelect('usuario', $usuarios, '',
            [
                'label' => 'Usuario',
                'required' => 'required'
            ]) }}

            {{ Form::bsNumber('consultas', '0', [
                'label' => 'Consultas',
                'placeholder' => 'Cantidad de Consultas',
                'required' => 'required'
            ]) }}
        {!! Form::close() !!}
    </div>
@endsection