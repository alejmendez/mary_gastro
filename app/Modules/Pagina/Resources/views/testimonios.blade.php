@extends('pagina::layouts.default')

@section('content')


<!--Page Title-->
<section class="page-title" style="background-image:url('public/img/bg-page-title-1.jpg');">
    <div class="auto-container">
        <h1>Testimonios</h1>
        <h3 class="styled-font">La opinión de mis pacientes es muy importante</h3>
    </div>
</section>

<!--Page Info-->
<section class="page-info">
    <div class="auto-container clearfix">
        <div class="breadcrumb-outer">
            <ul class="bread-crumb clearfix">
                <li>
                    <a href="{{ url('/') }}">Inicio</a>
                </li>
                <li>
                    Testimonios
                </li>
            </ul>
        </div>
    </div>
</section>

<!--Testimonials Section-->
<section class="testimonials-section">
    <div class="auto-container">
        
        <div class="sec-title">
            <div class="clearfix">
                <div class="pull-left">
                    <h2>Testimonios de mis Pacientes</h2>
                    <div class="separator"></div>
                </div>
            </div>
        </div>

            @foreach($testimonios as $testimonio)
            <div class="slide-item">
                <div class="inner-box">
                    <div class="slide-header">
                        <figure class="author-thumb">
                        <img width="90" height="90" src="{{ asset('public/archivos/testimonios/' . $testimonio->imagen) }}" class="attachment-90x90 size-90x90 wp-post-image" alt="{{ $testimonio->titulo }}" /></figure>
                        <h3 id="{{ str_slug($testimonio->titulo) }}">
                            {{ $testimonio->titulo }}
                        </h3>
                        <div class="designation" style="font-size: 24px">
                            {{ $testimonio->subtitulo }}
                        </div>
                    </div>
                    <div class="slide-content">
                        {!! $testimonio->descripcion !!}
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        
    </div>
</section>   

<section class="call-to-action">
    <div class="container">
        <div class="row">
    	    <div class="col-md-9 col-sm-9 text-right m-text-center" style="margin-top:8%">
                <h1 style="color:#fff" >¿También quieres dejar tu testimonio?</h1>
                <a href="{{ url('contacto') }}" class="btn btn-white">Comenta</a> 
            </div>
            
            <div class="col-md-3 col-sm-3 m-text-center">
                <img src="{{ asset('public/img/gabi2.jpg') }}" style="border-radius:150px;" /> 
            </div>
        </div>
    </div>
</section>	

@endsection

@push('css')


<style>
section {background:#ff7cbf; padding:40px 0;}

.btn {
    border-radius: 5px;
    margin: 21px 0 0 0;
    font-weight:700;
}

.btn.btn-white {
    background: #fff;
    color: #666;
    border-bottom: 4px solid #ddd;
}

@media (max-width: 768px) {
    .m-text-center {text-align:center;}
    .call-to-action h1{font-size:20px;}
}
@media (max-width: 1024px) {
    .m-text-center {text-align:center;}
    .call-to-action h1{font-size:25px;}
}

</style>

@endpush