<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="es">
<!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Doctora Mary Gastro." />
    <meta name="keywords" content="Doctora, Mary Gastro" />

    <title>Doctora Mary Gastro</title>

    <link rel="shortcut icon" type="image/ico" href="{{url('App/Modules/Pagina/Assets/img/favicon.png')}}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{url('app/Modules/Pagina/Assets/css/stylescsoom.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="transparent-layer shader-bg">

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!--- PRELOADER -->
    <div class="preeloader">
        <div class="preloader-spinner">
            <img src="img/loading.svg" alt="">
        </div>
    </div>

    <div class="main-area" id="home">
        <div class="main-area-bg"></div>
        @php
        $colores = ['#FF7CBF', '#2a7f00', '#E7D60C', '#1799B6'];
        $elemento = array_rand($colores);
        @endphp
        <div id="surface-shader" data-ambient-color="{{ $colores[$elemento] }}" data-diffuse-color="#666666"></div>

        <div class="welcome-text-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">
                        <div class="welcome-text text-center">
                            <div class="clock-countdown">
                                <div class="site-config" data-date="11/24/2017 00:00:00" data-date-timezone="+0"></div>
                                <div class="coundown-timer">
                                    <div class="single-counter"><span class="days">00</span><span class="normal">Dias</span></div>
                                    <div class="single-counter"><span class="hours">00</span><span class="normal">Horas</span></div>
                                    <div class="single-counter"><span class="minutes">00</span><span class="normal">Minutos</span></div>
                                    <div class="single-counter"><span class="seconds">00</span><span class="normal">Segundos</span></div>
                                </div>
                            </div>
                            <h3>Próximamente en www.marygastro.com.ve</h3>
                            <h1 class="visible-xs"></h1>
                            <h1 class="hidden-xs cd-headline clip is-full-width">
                                <span class="cd-words-wrapper">
                                    <b class="is-visible">Consultas Online</b>
                                    <b>Tips Nutricionales</b>
                                    <b>Consejos Medicos</b>
                                </span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social-book-mark">
            <ul>
                <li><a href="https://www.facebook.com/Maryraida?lst=1312639878%3A1160595543%3A1502303458"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{ url('https://www.instagram.com/mary_gastro/') }}'"><span class="fa fa-instagram"></span></a></li>
            </ul>
        </div>
    </div>

    <!--====== SCRIPTS JS ======-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.2.1/jquery-migrate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="{{url('app/Modules/Pagina/Assets/js/javascript.js')}}"></script>
</body>
</html>
