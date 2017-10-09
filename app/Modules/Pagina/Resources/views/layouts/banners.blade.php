<!DOCTYPE html>
<!--[if IE 8]>    <html lang="es" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>    <html lang="es" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--><html lang="es"><!--<![endif]-->
<head>
	@include('pagina::partials.head')
</head>

<body class="size-1140">
	@include('pagina::partials.page-header')

	<section>
		@include('pagina::partials.banner')
		@yield('content')
	</section>
	
	@include('pagina::partials.page-footer')

	@include('pagina::partials.footer')
</body>
</html>