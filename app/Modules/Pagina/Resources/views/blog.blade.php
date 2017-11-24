@extends('pagina::layouts.default')

@push('content')
<style>
ul {
	margin-left: 20px;
	list-style-type: circle;
}
li{
	padding:0px;
	margin:0px;	
}
</style>
@endpush

@section('content')
<section class="page-title" style="background-image:url('public/img/bg-page-title-1.jpg');">
	<div class="auto-container">
		<h1>Mary Gastro</h1>
		<h3 class="styled-font">Consejos y Recomendaciones</h3>
	</div>
</section>

<div class="sidebar-page-container">
<div class="auto-container">
<div class="row clearfix">
<div class="content-side  col-lg-9 col-md-8 col-sm-12 col-xs-12 ">
	<section class="blog-classic-view">
		<div id="post-323" class="post-323 post type-post status-publish format-standard has-post-thumbnail hentry category-our-blog tag-foods tag-workouts">
			<div class="news-style-one">
				<div class="inner-box">
					<figure class="image-box">
						<a href="#">
							<img width="870" height="500" src="{{ url('public/archivos/noticias/' . $noticia->imagenes->first()->archivo) }}" class="attachment-1170x500 size-1170x500 wp-post-image" alt="blog-image-11" />
						</a>
					</figure>
					<div class="lower-content">
						<div class="posted-info">
							{{ $controller->meses[$noticia->published_at->month] }}
							{{ $noticia->published_at->day }},
							{{ $noticia->published_at->year }}
						</div>
						<h3><a href="#">{{$noticia->titulo}}</a></h3>
						<div class="text">
							<p>{!! $noticia->contenido_html !!}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="sidebar-side col-lg-3 col-md-4 col-sm-6 col-xs-12">
	<aside class="sidebar">
		<div id="search-3" class="widget sidebar-widget widget_search">
			<div class="widget search-box sidebar-widget">
				<form method="get" action="{{ url('blogs') }}">
					<div class="form-group">
						<input type="text" name="q" value="" placeholder="Buscar...">
						<button type="submit"><span class="icon fa fa-search"></span></button>
					</div>
				</form>
			</div>
		</div>
		<div id="categories-3" class="widget sidebar-widget widget_categories">
			<div class="sidebar-title">
				<h3>Categorias</h3>
			</div>
			<ul>
				@foreach($categorias as $categoria)
					<li class="cat-item cat-item-24"><a href="{{ route('pag.categoria', ['slug' => str_slug($categoria->nombre)]) }}" >{{$categoria->nombre}}</a> ({{ $categoria->total }})</li>
				@endforeach
			</ul>
		</div>
		<div id="bunch_blog_recent_news-2" class="widget sidebar-widget widget_bunch_blog_recent_news">
			<div class="recent-posts">
				<div class="sidebar-title">
					<h3>Blogs Recientes</h3>
				</div>
				@foreach($listaNoticias as $noticia)
					<div class="post">
						<figure class="post-thumb">
							<img width="75" height="75" src="{{ url('public/archivos/noticias/' . $noticia->imagenes->first()->archivo) }}" class="attachment-75x75 size-75x75 wp-post-image" alt="5"  sizes="(max-width: 75px) 100vw, 75px" />
							<a href="#" class="overlay-link">
								<span class="fa fa-link"></span>
							</a>
						</figure>
						<div class="desc-text"><a href="{{ route('pag.blog', ['slug' => $noticia->slug]) }}">{{$noticia->titulo}} ...</a></div>
						<div class="time">
							{{ $controller->meses[$noticia->published_at->month] }}
							{{ $noticia->published_at->day }},
							{{ $noticia->published_at->year }}
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</aside>
</div>
@endsection