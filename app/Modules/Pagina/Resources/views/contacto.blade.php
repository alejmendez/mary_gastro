@extends('pagina::layouts.default')

@section('content')
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url('public/img/bg-page-title-1.jpg');">
        <div class="auto-container">
            <h1>Contacto</h1>
            <h3 class="styled-font">¿Tienes alguna duda o sugerencia?.</h3>
        </div>
    </section>
    
    <!--Page Info-->
    <section class="page-info">
        <div class="auto-container clearfix">
            <div class="breadcrumb-outer">
                <ul class="bread-crumb clearfix"><li><a href="{{ url('/') }}">Inicio</a></li><li>Contacto</li></ul>            </div>
        </div>
    </section>

    <div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">
<!--Contact Section-->
<section class="contact-section">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!--Form Column -->
            <div class="column form-column pull-right col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="sec-title"><h2>Escribeme</h2><div class="separator"></div></div>
                <!--form-box-->
                <div class="form-box default-form">
                    <div class="contact-form default-form">
                        <div role="form" class="wpcf7">
<div class="screen-reader-response">
    {{ $msj }}
</div>
<form action="{{ url('send-mail') }}" method="post" class="wpcf7-form" novalidate="novalidate">
    {{ csrf_field() }}
<div style="display: none;">
</div>
<div id="contact-form">
<div class="row clearfix">
<div class="form-group col-md-6 col-sm-6 col-xs-12">
        <span class="wpcf7-form-control-wrap text-36">
            <input type="text" name="nombre" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Nombre y Apellido" />
        </span>
    </div>
<div class="form-group col-md-6 col-sm-6 col-xs-12">
        <span class="wpcf7-form-control-wrap email-927">
            <input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="E-mail" />
        </span>
    </div>
<div class="form-group col-md-6 col-sm-6 col-xs-12">
        <span class="wpcf7-form-control-wrap text-37">
            <input type="text" name="telefono" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Número de Contacto" />
        </span>
    </div>
<div class="form-group col-md-6 col-sm-6 col-xs-12">
    <span class="wpcf7-form-control-wrap menu-398">
        <select name="asunto" class="wpcf7-form-control wpcf7-select" aria-invalid="false">
            <option value="Asunto">Asunto</option>
            <option value="Personal">Personal</option>
            <option value="Urgente">Urgente</option>
            <option value="Sugerencia">Sugerencia</option>
            <option value="Testimonio">Testimonio</option>
        </select>
    </span>
</div>
<div class="form-group col-md-12 col-sm-12 col-xs-12">
        <span class="wpcf7-form-control-wrap textarea-178">
            <textarea name="mensaje" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Ingrese su mensaje"></textarea>
        </span>
    </div>
<div class="form-group col-md-12 col-sm-12 col-xs-12">
        <input type="submit" value="Enviar" class="wpcf7-form-control wpcf7-submit theme-btn btn-style-one" />
    </div>
</div>
</div>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div>                    </div>
                </div>
            </div>
            
            <!--Column-->
            <div class="column info-column pull-left col-lg-6 col-md-8 col-sm-12 col-xs-12">
                <div class="sec-title">
                    <h2>Consultorio</h2>
                    <div class="separator"></div>
                </div>
                <!--Info Tabs-->
                <div class="tabs-box info-tabs">
                    <!--Tab Buttons-->
                    <ul class="tab-buttons clearfix">
                    	<li class="tab-btn active-btn" data-tab="#info-tab-11">Venezuela</li>
                    </ul>
                    
                    <!--Tabs Content-->
                    <div class="tabs-content"> 
                        <!--Tab / Active Tab-->
                        <div class="tab active-tab" id="info-tab-11">
                            <div class="desc-text">Puede solicitar una cita previa en mi consultorio.</div>
                            
                            <h3 class="location-title">Estado Bolívar</h3>
                            <div class="info-style-one">
                                <ul>
                                    <li><div class="icon-box"><span class="fa fa-globe"></span></div><h4>Consultorio :</h4><div class="text">Centro Cardiovascular Integral, S.A. Edif. Nolly Lc 01 <br> Ciudad Bolívar - Venezuela.</div></li>
                                    <li><div class="icon-box"><span class="flaticon-envelope"></span></div><h4>¿Más Información?:</h4><div class="text">info@marygastro.com.ve</div></li>
                                    <li><div class="icon-box"><span class="flaticon-technology-1"></span></div><h4>Telf:</h4><div class="text"> +58 285 654 62 94</div></li>
                                </ul>
                            </div>
                        </div>
                </div><!--End Info Tabs-->
                
            </div>
            
        </div>    
    </div>
</section>

</div></div></div></div><div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">

<!--Map Section-->
<section class="map-section">
    <div class="map-outer">

        <!--Map Canvas-->
       {{--   <div class="map-canvas"
            data-zoom="10"
            data-lat="40.705311"
            data-lng="-74.2581948"
            data-type="roadmap"
            data-hue="#fc721e"
            data-title="Ciudad Bolívar, Venezuela"
            data-content="Ciudad Bolívar, Venezuela<br><a href='mailto:info@marygastro.com.ve'>info@marygastro.com.ve</a>"
            style="height:480px;">
        </div>  --}}

        <div class="col-md-12 col-sm-12 col-xs-12" style="height:480px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1974.9259833775754!2d-63.543495811140254!3d8.116551177501774!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9e87127d9dd4e9d7!2sCentro+Cardivascular!5e0!3m2!1ses!2sve!4v1507667056177" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        

    </div>
</section>
	

@endsection

