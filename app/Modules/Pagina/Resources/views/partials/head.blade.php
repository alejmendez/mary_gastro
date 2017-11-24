	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<meta name="csrf-token" content="{{ csrf_token() }}"/>

	<meta name="robots" content="NONE,NOARCHIVE" />

	{!! SEO::generate(true) !!}
	
@if (isset($html['css']))
@foreach ($html['css'] as $css)
	<link rel="stylesheet" type="text/css" href="{{ asset($css) }}" />
@endforeach
@endif

<link rel="stylesheet" type="text/css" href="{{ asset('public/css/pagina/components.css') }}?v={{ env('APP_VERSION') }}" />
	
<link rel='stylesheet' type='text/css' id='contact-form-7-css'  href="{{ asset('public/css/pagina/styles.css') }}?v={{ env('APP_VERSION') }}" />
<link rel='stylesheet' type='text/css' id='rs-plugin-settings-css'  href="{{ asset('public/css/pagina/settings.css') }}?v={{ env('APP_VERSION') }}" />

<link rel='stylesheet' type='text/css' id='owl-css'  href="{{ asset('public/css/pagina/owl.css') }}?v={{ env('APP_VERSION') }}" />
<link rel='stylesheet' type='text/css' id='flaticon-css'  href="{{ asset('public/css/pagina/flaticon.css') }}?v={{ env('APP_VERSION') }}" />
<link rel='stylesheet' type='text/css' id='fancybox-css'  href="{{ asset('public/css/pagina/jquery.fancybox.css') }}?v={{ env('APP_VERSION') }}" />
<link rel='stylesheet' type='text/css' id='mCustomScrollbar-css'  href="{{ asset('public/css/pagina/jquery.mCustomScrollbar.min.css') }}?v={{ env('APP_VERSION') }}" />
<link rel='stylesheet' type='text/css' id='bootstrap-touchspin-css'  href="{{ asset('public/css/pagina/jquery.bootstrap-touchspin.css') }}?v={{ env('APP_VERSION') }}" />
<link rel='stylesheet' type='text/css' id='healthcoach_main-style-css'  href="{{ asset('public/css/pagina/style.css') }}?v={{ env('APP_VERSION') }}" />
<link rel='stylesheet' type='text/css' id='healthcoach_custom-style-css'  href="{{ asset('public/css/pagina/custom.css') }}?v={{ env('APP_VERSION') }}" />
<link rel='stylesheet' type='text/css' id='healthcoach_responsive-css'  href="{{ asset('public/css/pagina/responsive.css') }}?v={{ env('APP_VERSION') }}" />
<link rel='stylesheet' type='text/css' id='ecomanic-theme-slug-fonts-css'  href="https://fonts.googleapis.com/css?family=Open%20Sans:300,300i,400,400i|Poppins:300,400,500,600,700|Shadows+Into+Light|Shadows%20Into%20Light&subset=latin,latin-ext" />
<link rel='stylesheet' type='text/css' id='js_composer_front-css'  href="{{ asset('public/css/pagina/js_composer.min.css') }}?v={{ env('APP_VERSION') }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	@stack('css') 