@extends(isset($layouts) ? $layouts : 'base::layouts.default')

@section('content-top')
 	@include('base::partials.botonera')
	@include('base::partials.ubicacion', ['ubicacion' => ['Inbox']])
@endsection

@section('content')
	<div class="row">
        {!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST' ]) !!}
            {!! $Incidencias->generate() !!}
        {!! Form::close() !!}
    </div>
      
@endsection

@push('js')
	<script>
		var casos = "{{intval($casos)}}";
	</script>
@endpush
