	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>

	<meta name="robots" content="NONE,NOARCHIVE" />

	<?php echo SEO::generate(true); ?>

	
<?php if(isset($html['css'])): ?>
<?php $__currentLoopData = $html['css']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $css): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset($css)); ?>" />
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/pagina/components.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
	
	<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<link rel='stylesheet' type='text/css' id='contact-form-7-css'  href="<?php echo e(asset('public/css/pagina/styles.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='rs-plugin-settings-css'  href="<?php echo e(asset('public/css/pagina/settings.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<style id='rs-plugin-settings-inline-css' type='text/css'>
#rs-demo-id {}
</style>

<!--
  <link rel='stylesheet' type='text/css' id='woocommerce-layout-css'  href="<?php echo e(asset('public/css/pagina/woocommerce-layout91ac44444.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='woocommerce-smallscreen-css'  href="<?php echo e(asset('public/css/pagina/woocommerce-smallscreen91ac.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='woocommerce-general-css'  href="<?php echo e(asset('public/css/pagina/woocommerce91ac.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='animate-css'  href="<?php echo e(asset('public/css/pagina/animate.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='owl-theme-css'  href="<?php echo e(asset('public/css/pagina/owl.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='ecomanic_woocommerce-css'  href="<?php echo e(asset('public/css/pagina/woocommerce.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='js_composer_front-css'  href="<?php echo e(asset('public/css/pagina/jquery-ui.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='bootstrap-css'  href="<?php echo e(asset('public/css/pagina/bootstrap.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='gui-css'  href="<?php echo e(asset('public/css/pagina/jquery-ui.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='fontawesom-css'  href="<?php echo e(asset('public/css/pagina/font-awesome.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
-->
<link rel='stylesheet' type='text/css' id='owl-css'  href="<?php echo e(asset('public/css/pagina/owl.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='flaticon-css'  href="<?php echo e(asset('public/css/pagina/flaticon.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='fancybox-css'  href="<?php echo e(asset('public/css/pagina/jquery.fancybox.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='mCustomScrollbar-css'  href="<?php echo e(asset('public/css/pagina/jquery.mCustomScrollbar.min.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='bootstrap-touchspin-css'  href="<?php echo e(asset('public/css/pagina/jquery.bootstrap-touchspin.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='healthcoach_main-style-css'  href="<?php echo e(asset('public/css/pagina/style.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='healthcoach_custom-style-css'  href="<?php echo e(asset('public/css/pagina/custom.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='healthcoach_responsive-css'  href="<?php echo e(asset('public/css/pagina/responsive.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<link rel='stylesheet' type='text/css' id='ecomanic-theme-slug-fonts-css'  href="https://fonts.googleapis.com/css?family=Open%20Sans:300,300i,400,400i|Poppins:300,400,500,600,700|Shadows+Into+Light|Shadows%20Into%20Light&subset=latin,latin-ext" />
<link rel='stylesheet' type='text/css' id='js_composer_front-css'  href="<?php echo e(asset('public/css/pagina/js_composer.min.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>" />
<style id="rs-plugin-settings-inline-css" type="text/css">
#rs-demo-id {}
#rev_slider_1_1 .zeus.tparrows {
  cursor:pointer;
  min-width:70px;
  min-height:70px;
  position:absolute;
  display:block;
  z-index:100;
  border-radius:50%;   
  overflow:hidden;
  background:rgba(0,0,0,0.1);
}

#rev_slider_1_1 .zeus.tparrows:before {
  font-family: "revicons";
  font-size:20px;
  color:rgb(255, 255, 255);
  display:block;
  line-height: 70px;
  text-align: center;    
  z-index:2;
  position:relative;
}
#rev_slider_1_1 .zeus.tparrows.tp-leftarrow:before {
  content: "\e824";
}
#rev_slider_1_1 .zeus.tparrows.tp-rightarrow:before {
  content: "\e825";
}

#rev_slider_1_1 .zeus .tp-title-wrap {
  background:rgba(0,0,0,0.5);
  width:100%;
  height:100%;
  top:0px;
  left:0px;
  position:absolute;
  opacity:0;
  transform:scale(0);
  -webkit-transform:scale(0);
   transition: all 0.3s;
  -webkit-transition:all 0.3s;
  -moz-transition:all 0.3s;
   border-radius:50%;
 }
#rev_slider_1_1 .zeus .tp-arr-imgholder {
  width:100%;
  height:100%;
  position:absolute;
  top:0px;
  left:0px;
  background-position:center center;
  background-size:cover;
  border-radius:50%;
  transform:translatex(-100%);
  -webkit-transform:translatex(-100%);
   transition: all 0.3s;
  -webkit-transition:all 0.3s;
  -moz-transition:all 0.3s;

 }
#rev_slider_1_1 .zeus.tp-rightarrow .tp-arr-imgholder {
    transform:translatex(100%);
  -webkit-transform:translatex(100%);
      }
#rev_slider_1_1 .zeus.tparrows:hover .tp-arr-imgholder {
  transform:translatex(0);
  -webkit-transform:translatex(0);
  opacity:1;
}
      
#rev_slider_1_1 .zeus.tparrows:hover .tp-title-wrap {
  transform:scale(1);
  -webkit-transform:scale(1);
  opacity:1;
}
 
</style>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<?php echo $__env->yieldPushContent('css'); ?> 