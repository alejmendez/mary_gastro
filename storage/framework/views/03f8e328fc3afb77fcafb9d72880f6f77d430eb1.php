<?php $__env->startSection('content'); ?>
    
    <!--Page Title-->
<section class="page-title" style="background-image:url('<?php echo e(asset('public/img/bg-pag')); ?>e-title-1.jpg');">
   <div class="auto-container">
      <h1>Galería de Fotos</h1>
      <h3 class="styled-font">GastroPediatra en Acción</h3>
   </div>
</section>
<!--Page Info-->
<section class="page-info">
   <div class="auto-container clearfix">
      <div class="breadcrumb-outer">
         <ul class="bread-crumb clearfix">
            <li><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
            <li>Galería de fotos</li>
         </ul>
      </div>
   </div>
</section>
<div class="vc_row wpb_row vc_row-fluid">
<div class="wpb_column vc_column_container vc_col-sm-12">
<div class="vc_column-inner ">
<div class="wpb_wrapper">
<!--Gallery Section-->
<center>
<!-- SnapWidget -->
<div class="auto-container">
    <div class="row">
    <div class="col-lg-1 hidden-xs"></div>
    <div class="col-lg-10 col-xs-12">
        <iframe src="http://www.instabrowse.es/7xudxzlo4m/widget.html" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:1025px; height: 800px; " ></iframe><a href="http://www.instabrowse.es/instagram-en-tu-blog.html" style="font-size: 10px; font-style:italic; color:#bebebe; " target="_blank">#mary_gastro</a>
    </div>
    <div class="col-lg-1 hidden-xs"></div>
    
    </div>
</div>

    </center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pagina::layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>