<?php $__env->startSection('content'); ?>
 <!--Page Title-->
<section class="page-title" style="background-image:url('public/img/bg-page-title-1.jpg');">
	<div class="auto-container">
		<h1>Mary Gastro</h1>
		<h3 class="styled-font">Consejos y Recomendaciones</h3>
	</div>
</section><!--Page Info-->
<!--Page Info-->
<section class="page-info">
  <div class="auto-container clearfix">
    <div class="breadcrumb-outer">
      <ul class="bread-crumb clearfix">
        
      </ul>
    </div>
  </div>
</section>
<!--Sidebar Page-->
<div class="sidebar-page-container">
<div class="auto-container">
<div class="row clearfix">
<!-- sidebar area -->
<!--Content Side-->	
<div class="content-side  col-lg-9 col-md-8 col-sm-12 col-xs-12 ">
  <!--Default Section-->
  <section class="blog-classic-view">
    <!--Blog Post-->
    <!-- blog post item -->



<?php $__currentLoopData = $detNoti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detNotis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <!-- Post -->
      <div id="post-323" class="post-323 post type-post status-publish format-standard has-post-thumbnail hentry category-our-blog tag-foods tag-workouts">
        <!--News Style One-->
        <div class="news-style-one">
          <div class="inner-box">
            <figure class="image-box">
              <a href="#">
              <img width="870" height="500" src="<?php echo e(url('public/archivos/noticias/'.$detNotis->archivo)); ?>" class="attachment-1170x500 size-1170x500 wp-post-image" alt="blog-image-11"  /> </a>
            </figure>
            <div class="lower-content">
              <?php
                  $porciones = explode("/",$detNotis->published_at);
                  $dia = explode(" ",$porciones[2]);
                  $fecha = $controller->meses[$porciones[1]].' '. $dia[0] . ', '. $porciones[2];
              ?>
              <div class="posted-info"><?php echo e($fecha); ?></div>
              <h3><a href="#"><?php echo e($detNotis->titulo); ?></a></h3>
              <div class="text">
                <p><?php echo $detNotis->contenido_html; ?></p>
              </div>
            </div>
          </div>
        </div>
        <!-- blog post item -->
        <!-- End Post -->
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    <!-- blog post item -->
    <!-- Post -->
   
  </section>
</div>
<!--Content Side-->
<!--Sidebar-->	
<!-- sidebar area -->
<div class="sidebar-side col-lg-3 col-md-4 col-sm-6 col-xs-12">
  <aside class="sidebar">
    <div id="search-3" class="widget sidebar-widget widget_search">
      <!-- Search Form -->
      <div class="widget search-box sidebar-widget">
        <form method="get" action="#">
          <div class="form-group">
            <input type="search" name="s" value="" placeholder="Search..">
            <button type="submit"><span class="icon fa fa-search"></span></button>
          </div>
        </form>
      </div>
    </div>
    <div id="categories-3" class="widget sidebar-widget widget_categories">
      <div class="sidebar-title">
        <h3>Categories</h3>
      </div>
      <ul>
        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="cat-item cat-item-24"><a href="<?php echo e(url('/blog/'.str_slug($categoria->nombre))); ?>" ><?php echo e($categoria->nombre); ?></a> (<?php echo e($categoria->total); ?>)</li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
    <div id="bunch_blog_recent_news-2" class="widget sidebar-widget widget_bunch_blog_recent_news">
      <!-- Recent News -->
      <div class="recent-posts">
        <div class="sidebar-title">
          <h3>Recents News</h3>
        </div>
        <!-- Recent Posts -->
        <?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="post">
            <figure class="post-thumb">
              <img width="75" height="75" src="<?php echo e(url('public/archivos/noticias/'.$noticia->archivo)); ?>" class="attachment-75x75 size-75x75 wp-post-image" alt="5"  sizes="(max-width: 75px) 100vw, 75px" />
              <a href="<?php echo e(url('/blog/noticia/'. $noticia->slug)); ?>" class="overlay-link">
                <span class="fa fa-link"></span>
              </a></figure>
            <div class="desc-text"><a href="<?php echo e(url('/blog/noticia/'. $noticia->slug)); ?>"><?php echo e($noticia->titulo); ?> ...</a></div>
            <?php
                $porciones = explode("/",$noticia->published_at);
                $dia = explode(" ",$porciones[2]);
                $fecha = $controller->meses[$porciones[1]].' '. $dia[0] . ', '. $porciones[2];
            ?>
            <div class="time"><?php echo e($fecha); ?></div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </aside>
</div>
<!--Sidebar-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('pagina::layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>