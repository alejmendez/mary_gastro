@extends('pagina::layouts.default')

@section('content')
    
    <!--Page Title-->
<section class="page-title" style="background-image:url('../wp-content/uploads/2016/11/bg-page-title-1.jpg');">
    <div class="auto-container">
        <h1>Classic Style With Sidebar</h1>
        <h3 class="styled-font">We Offer healthier lifestyle.</h3>
    </div>
</section>

<!--Page Info-->
<section class="page-info">
    <div class="auto-container clearfix">
        <div class="breadcrumb-outer">
            <ul class="bread-crumb clearfix"><li><a href="{{ url('/') }}">Inicio</a></li><li><a href="index.html">Archive for 2016</a></li></ul>        </div>
    </div>
</section>

<div class="vc_row wpb_row vc_row-fluid sidebar-page-container"><div class="container"><div class="wpb_column vc_column_container vc_col-sm-9"><div class="vc_column-inner "><div class="wpb_wrapper">   


<!--Content Side-->      
<div class="content-side">
 
 <!--Blog List-->
 <section class="blog-list-view">
    @foreach($blogs as $blog)
    <div class="news-style-one list-style">
        <div class="inner-box">
            <div class="row clearfix">
                <div class="image-column col-lg-4 col-md-5 col-sm-4 col-xs-12">
                    <figure class="image-box">
                        <a href="{{ url('blog/' . $blog->slug) }}">
                            <img width="270" height="247" src="{{ asset('public/archivos/noticias/' . $blog->imagen()->archivo) }}" class="attachment-270x247 size-270x247 wp-post-image" alt="{{ $blog->imagen()->leyenda }}">
                        </a>
                    </figure>
                </div>
                <div class="content-column col-lg-8 col-md-7 col-sm-8 col-xs-12">
                    <div class="lower-content">
                        <div class="posted-info">{{ $blog->published_at->format('d / m / Y') }}</div>
                        <h3>
                            <a href="{{ url('blog/' . $blog->slug) }}">
                                {{ $blog->titulo }}
                            </a>
                        </h3>
                        <div class="text">
                            {{ $blog->resumen }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>

 <!-- Styled Pagination -->
<div class="styled-pagination text-center">
    <ul class="pagination">
    <li>
        <a class="icon @if ( $blogs->currentPage() == 1 ) disabled @endif item" @if ( $blogs->currentPage() !== 1 ) href="{{ $blogs->previousPageUrl() }}" @endif>
            <i class="fa fa-caret-left"></i>
        </a>
    </li> 

    @if ( $blogs->currentPage() > 1 )
        @for ($i = 1; $i < $blogs->currentPage(); $i++)
            <a href="{{ $blogs->url($i) }}" class="item">
                {{ $i }}
            </a>
        @endfor
    @endif

    <li><span class="page-numbers current">{{ $blogs->currentPage() }}</span></li>

    @if ( $blogs->hasMorePages() )
        @for ($i = $blogs->currentPage()+1; $i <= $blogs->lastPage(); $i++)
            <li>
                <a href="{{ $blogs->url($i) }}" class="item">
                    {{ $i }}
                </a>
            </li>
        @endfor
    @endif

    <li>
        <a class="next page-numbers @if ( $blogs->lastPage() == $blogs->currentPage() ) disabled @endif" @if ( $blogs->lastPage() !== $blogs->currentPage() ) href="{{ $blogs->nextPageUrl() }}" @endif>
            <i class="fa fa-caret-right"></i>
        </a>
    </li>
</div>

</div><!--End Content Side-->

</div></div></div><div class="sidebar-side wpb_column vc_column_container vc_col-sm-3"><div class="vc_column-inner "><div class="wpb_wrapper">
 <div class="wpb_widgetised_column wpb_content_element sidebar">
     <div class="wpb_wrapper">
         
         <div id="search-3" class="widget sidebar-widget widget_search"><!-- Search Form -->
<div class="widget search-box sidebar-widget">
 <form method="get" action="http://asianitbd.com/wp/healthcoach/">
     <div class="form-group">
         <input type="search" name="s" value="" placeholder="Search..">
         <button type="submit"><span class="icon fa fa-search"></span></button>
     </div>
 </form>
</div>

</div><div id="categories-3" class="widget sidebar-widget widget_categories"><div class="sidebar-title"><h3>Categories</h3></div>		<ul>
 <li class="cat-item cat-item-24"><a href="http://asianitbd.com/wp/healthcoach/category/blog-grid-view/">Blog Grid View</a> (12)
</li>
 <li class="cat-item cat-item-21"><a href="http://asianitbd.com/wp/healthcoach/category/blog-list-view/">Blog List View</a> (7)
</li>
 <li class="cat-item cat-item-1"><a href="http://asianitbd.com/wp/healthcoach/category/news-and-articles/">News and Articles</a> (3)
</li>
 <li class="cat-item cat-item-26"><a href="http://asianitbd.com/wp/healthcoach/category/our-blog/">Our Blog</a> (5)
</li>
     </ul>
</div><div id="bunch_blog_recent_news-2" class="widget sidebar-widget widget_bunch_blog_recent_news">		
     <!-- Recent News -->
     <div class="recent-posts">
         <div class="sidebar-title"><h3>Recents News</h3></div>			
                     
                     <!-- Recent Posts -->
         <div class="post">
             <figure class="post-thumb"><img width="75" height="75" src="http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/5-1-75x75.jpg" class="attachment-75x75 size-75x75 wp-post-image" alt="5" srcset="http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/5-1-75x75.jpg 75w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/5-1-150x150.jpg 150w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/5-1-300x300.jpg 300w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/5-1-768x768.jpg 768w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/5-1-1024x1024.jpg 1024w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/5-1-107x107.jpg 107w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/5-1-270x270.jpg 270w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/5-1-90x90.jpg 90w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/5-1.jpg 1170w" sizes="(max-width: 75px) 100vw, 75px"><a href="http://asianitbd.com/wp/healthcoach/2016/11/build-an-athletic-body-with-in-eight-weeks-time/" class="overlay-link"><span class="fa fa-link"></span></a></figure>
             <div class="desc-text"><a href="http://asianitbd.com/wp/healthcoach/2016/11/build-an-athletic-body-with-in-eight-weeks-time/">Build an Athletic Body With In Eight ...</a></div>
             <div class="time">November 18, 2016</div>
         </div>
                     <!-- Recent Posts -->
         <div class="post">
             <figure class="post-thumb"><img width="75" height="75" src="http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/1-1-75x75.jpg" class="attachment-75x75 size-75x75 wp-post-image" alt="1" srcset="http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/1-1-75x75.jpg 75w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/1-1-150x150.jpg 150w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/1-1-300x300.jpg 300w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/1-1-768x768.jpg 768w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/1-1-1024x1024.jpg 1024w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/1-1-107x107.jpg 107w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/1-1-270x270.jpg 270w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/1-1-90x90.jpg 90w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/1-1.jpg 1170w" sizes="(max-width: 75px) 100vw, 75px"><a href="http://asianitbd.com/wp/healthcoach/2016/11/what-is-a-healthy-food-the-answer-will-surprise-you/" class="overlay-link"><span class="fa fa-link"></span></a></figure>
             <div class="desc-text"><a href="http://asianitbd.com/wp/healthcoach/2016/11/what-is-a-healthy-food-the-answer-will-surprise-you/">What is a “Healthy” Food? The Answer ...</a></div>
             <div class="time">November 18, 2016</div>
         </div>
                     <!-- Recent Posts -->
         <div class="post">
             <figure class="post-thumb"><img width="75" height="75" src="http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/4-1-75x75.jpg" class="attachment-75x75 size-75x75 wp-post-image" alt="4" srcset="http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/4-1-75x75.jpg 75w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/4-1-150x150.jpg 150w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/4-1-300x300.jpg 300w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/4-1-768x768.jpg 768w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/4-1-1024x1024.jpg 1024w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/4-1-107x107.jpg 107w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/4-1-270x270.jpg 270w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/4-1-90x90.jpg 90w, http://asianitbd.com/wp/healthcoach/wp-content/uploads/2016/11/4-1.jpg 1170w" sizes="(max-width: 75px) 100vw, 75px"><a href="http://asianitbd.com/wp/healthcoach/2016/11/stop-getting-annoyed-if-you-want-better-health/" class="overlay-link"><span class="fa fa-link"></span></a></figure>
             <div class="desc-text"><a href="http://asianitbd.com/wp/healthcoach/2016/11/stop-getting-annoyed-if-you-want-better-health/">Stop Getting Annoyed If You Want Better ...</a></div>
             <div class="time">November 18, 2016</div>
         </div>
     </div>
     
     </div><div id="archives-3" class="widget sidebar-widget widget_archive"><div class="sidebar-title"><h3>News Archives</h3></div>		<ul>
         <li><a href="http://asianitbd.com/wp/healthcoach/2016/11/">November 2016</a>&nbsp;(27)</li>
     </ul>
     </div><div id="tag_cloud-2" class="widget sidebar-widget widget_tag_cloud"><div class="sidebar-title"><h3>Tags Cloud</h3></div><div class="tagcloud"><a href="http://asianitbd.com/wp/healthcoach/tag/diet/" class="tag-link-30 tag-link-position-1" title="1 topic" style="font-size: 8pt;">Diet</a>
<a href="http://asianitbd.com/wp/healthcoach/tag/fitness/" class="tag-link-22 tag-link-position-2" title="12 topics" style="font-size: 22pt;">Fitness</a>
<a href="http://asianitbd.com/wp/healthcoach/tag/foods/" class="tag-link-28 tag-link-position-3" title="1 topic" style="font-size: 8pt;">Foods</a>
<a href="http://asianitbd.com/wp/healthcoach/tag/healthy-food/" class="tag-link-23 tag-link-position-4" title="12 topics" style="font-size: 22pt;">Healthy Food</a>
<a href="http://asianitbd.com/wp/healthcoach/tag/kids/" class="tag-link-34 tag-link-position-5" title="1 topic" style="font-size: 8pt;">Kids</a>
<a href="http://asianitbd.com/wp/healthcoach/tag/men/" class="tag-link-31 tag-link-position-6" title="1 topic" style="font-size: 8pt;">Men</a>
<a href="http://asianitbd.com/wp/healthcoach/tag/recipes/" class="tag-link-32 tag-link-position-7" title="1 topic" style="font-size: 8pt;">Recipes</a>
<a href="http://asianitbd.com/wp/healthcoach/tag/seniors/" class="tag-link-33 tag-link-position-8" title="1 topic" style="font-size: 8pt;">Seniors</a>
<a href="http://asianitbd.com/wp/healthcoach/tag/workouts/" class="tag-link-27 tag-link-position-9" title="1 topic" style="font-size: 8pt;">Workouts</a>
<a href="http://asianitbd.com/wp/healthcoach/tag/yoga/" class="tag-link-29 tag-link-position-10" title="1 topic" style="font-size: 8pt;">Yoga</a></div>
</div>
     </div>
 </div>
</div></div></div></div></div>

@endsection