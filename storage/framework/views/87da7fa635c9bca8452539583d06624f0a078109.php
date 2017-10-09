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

<script src="//www.powr.io/powr.js" external-type="html"></script> 
 <div class="powr-instagram-feed" id="e8d7feb9_1507317524"></div>

</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pagina::layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>