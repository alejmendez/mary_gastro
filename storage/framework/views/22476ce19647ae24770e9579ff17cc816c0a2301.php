	<script type="text/javascript">
		var $url = "<?php echo e(URL::current()); ?>/",
			$urlApp = "<?php echo e(env('APP_URL')); ?>/",
			sessionLife = <?php echo e(\Config::get('session.lifetime')); ?>;
	</script>
	
	<?php if(isset($html['js'])): ?>
	<?php $__currentLoopData = $html['js']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<script type="text/javascript" src="<?php echo e(asset($js)); ?>?v=<?php echo e(env('APP_VERSION')); ?>"></script>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>

	<script type="text/javascript" src="<?php echo e(asset('public/js/pagina/response.js')); ?>?v=<?php echo e(env('APP_VERSION')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/js/pagina/init.js')); ?>?v=<?php echo e(env('APP_VERSION')); ?>"></script>

	<script type="text/javascript" src="<?php echo e(asset('public/js/pagina/comment-reply.min.js')); ?>?v=<?php echo e(env('APP_VERSION')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/js/pagina/underscore.min.js')); ?>?v=<?php echo e(env('APP_VERSION')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/js/pagina/wp-embed.min.js')); ?>?v=<?php echo e(env('APP_VERSION')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/js/pagina/wp-util.min.js')); ?>?v=<?php echo e(env('APP_VERSION')); ?>"></script>
	
	<script type="text/javascript" src="<?php echo e(asset('public/js/pagina/jquery.fancybox.pack.js')); ?>?v=<?php echo e(env('APP_VERSION')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/js/pagina/jquery.fancybox-media.js')); ?>?v=<?php echo e(env('APP_VERSION')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/js/pagina/jquery.themepunch.revolution.min.js')); ?>?v=<?php echo e(env('APP_VERSION')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/js/pagina/jquery.themepunch.tools.min.js')); ?>?v=<?php echo e(env('APP_VERSION')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/js/pagina/owl.js')); ?>?v=<?php echo e(env('APP_VERSION')); ?>"></script>

	<script type='text/javascript' src="http://maps.google.com/maps/api/js?key&ver=4.6.6"></script>
	<script type='text/javascript' src="<?php echo e(asset('public/js/pagina/map-script.js')); ?>"></script>
	<script type='text/javascript' src="<?php echo e(asset('public/js/pagina/script.js')); ?>"></script>
	<script type='text/javascript' src="<?php echo e(asset('public/js/pagina/mixitup.js')); ?>"></script>
	<script type='text/javascript' src="<?php echo e(asset('public/js/pagina/js_composer_front.min.js')); ?>"></script>

	<script type="text/javascript">
		var setREVStartSize=function(){
			try{var e=new Object,i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;
				e.c = jQuery('#rev_slider_1_1');
				e.gridwidth = [1200];
				e.gridheight = [910];
						
				e.sliderLayout = "fullwidth";
				if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})
				
			}catch(d){console.log("Failure at Presize of Slider:"+d)}
		};
		
		setREVStartSize();
		
		var tpj=jQuery;
		
		var revapi1;
		tpj(document).ready(function() {
			if(tpj("#rev_slider_1_1").revolution == undefined){
				revslider_showDoubleJqueryError("#rev_slider_1_1");
			}else{
				revapi1 = tpj("#rev_slider_1_1").show().revolution({
					sliderType:"standard",
jsFileLocation:"//asianitbd.com/wp/healthcoach/wp-content/plugins/revslider/public/assets/js/",
					sliderLayout:"fullwidth",
					dottedOverlay:"none",
					delay:9000,
					navigation: {
						keyboardNavigation:"off",
						keyboard_direction: "horizontal",
						mouseScrollNavigation:"off",
						mouseScrollReverse:"default",
						onHoverStop:"off",
						arrows: {
							style:"zeus",
							enable:true,
							hide_onmobile:false,
							hide_onleave:false,
							tmp:'<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
							left: {
								h_align:"left",
								v_align:"center",
								h_offset:15,
								v_offset:0
							},
							right: {
								h_align:"right",
								v_align:"center",
								h_offset:15,
								v_offset:0
							}
						}
					},
					visibilityLevels:[1240,1024,778,480],
					gridwidth:1200,
					gridheight:910,
					lazyType:"none",
					shadow:0,
					spinner:"spinner0",
					stopLoop:"off",
					stopAfterLoops:-1,
					stopAtSlide:-1,
					shuffle:"off",
					autoHeight:"off",
					disableProgressBar:"on",
					hideThumbsOnMobile:"off",
					hideSliderAtLimit:0,
					hideCaptionAtLimit:0,
					hideAllCaptionAtLilmit:0,
					debugMode:false,
					fallbacks: {
						simplifyAll:"off",
						nextSlideOnWindowFocus:"off",
						disableFocusListener:false,
					}
				});
			}
		});	/*ready*/
	</script>
	<?php echo $__env->yieldPushContent('js'); ?>