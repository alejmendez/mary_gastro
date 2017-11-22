<!-- Main Header-->
    <header class="main-header">
    	<!-- Header Top -->
    	<div class="header-top">
        	<div class="auto-container">
            	<div class="clearfix">
                    
                    <!--Top Left-->
                    <div class="top-left pull-left">
                    	<ul>
                        	<li><span class="styled-font">¿Tienes alguna inquietud? </span></li> 
                            <li><span class="fa fa-phone"></span> +58 285 654 62 94</li>                            
                            <li><span class="fa fa-envelope-o"></span>  info@marygastro.com.ve</li>                            
                            <li><span class="fa fa-globe"></span> Ciudad Bolívar - Venezuela</li>                        </ul>    
                    </div>
                    
                    <!--Top Right-->

                    <?php if(Auth::check()): ?> 
                         <div class="top-right pull-right">
                          
                             <a href="<?php echo e(url('/backend')); ?>"  class="theme-btn" ><?php echo e(Auth::user()->usuario); ?></a>
                         </div>
                    <?php else: ?>
                        <div class="top-right pull-right">
                            <a href="<?php echo e(url('/backend')); ?>"  class="theme-btn" >CONSULTAS EN LINEA</a>
                        </div>
                    <?php endif; ?> 
                </div>
            </div>
        </div><!-- Header Top End -->
    
        <!-- Main Box -->
    	<div class="main-box">
        	<div class="auto-container">
            	<div class="outer-container clearfix">
                    <!--Logo Box-->
                    <div class="logo-box">
                        <div class="logo">
                        	<a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('public/img/logo.png')); ?>" alt="" title="MaryGastro"></a>
                        </div>
                    </div>
                    
                    <!--Nav Outer-->
                    <div class="nav-outer clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->    	
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                            </div>
                            
                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                    <li class="menu-item <?php echo e(Request::is('/') ? 'current-menu-item active' : ''); ?>">
                                        <a title="Inicio" href="<?php echo e(url('/')); ?>" class="hvr-underline-from-left1" data-scroll data-options="easing: easeOutQuart">
                                            Inicio
                                        </a>
                                    </li>
                                    <li class="menu-item <?php echo e(Request::is('marygastro') ? 'current-menu-item active' : ''); ?>">
                                        <a title="¿Quién soy?" href="<?php echo e(url('marygastro')); ?>" data-toggle="dropdown1" aria-expanded="false" data-scroll data-options="easing: easeOutQuart">
                                            Mary Gastro
                                        </a>
                                    </li>
                                    <li class="menu-item <?php echo e(Request::is('fotos') ? 'current-menu-item active' : ''); ?>">
                                        <a title="Mis Fotos" href="<?php echo e(url('fotos')); ?>" data-toggle="dropdown1" aria-expanded="false" data-scroll data-options="easing: easeOutQuart">
                                            Galería
                                        </a>
                                    </li>
                                    <li class="menu-item <?php echo e(Request::is('testimonios') ? 'current-menu-item active' : ''); ?>">
                                        <a title="¿Qué dicen mis pacientes?" href="<?php echo e(url('testimonios')); ?>" data-toggle="dropdown1" aria-expanded="false" data-scroll data-options="easing: easeOutQuart">
                                            Testimonios
                                        </a>
                                    </li>
                                    <li class="menu-item <?php echo e(Request::is('blogs') ? 'current-menu-item active' : ''); ?>">
                                        <a title="Descubre sobre mis artículos" href="<?php echo e(url('blogs')); ?>" data-toggle="dropdown1" aria-expanded="false" data-scroll data-options="easing: easeOutQuart">
                                            Blog
                                        </a>
                                    </li>
                                    <li class="menu-item <?php echo e(Request::is('contacto') ? 'current-menu-item active' : ''); ?>">
                                        <a title="¿Tienes alguna sugerencia?" href="<?php echo e(url('contacto')); ?>" data-scroll data-options="easing: easeOutQuart">
                                            Contacto
                                        </a>
                                    </li>
                                </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                    
                </div><!--Nav Outer End-->
            
            <!-- Hidden Nav Toggler -->
        
    </div>
</div>
    
    </header>
    <!--End Main Header -->
