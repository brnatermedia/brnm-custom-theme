<?php 
/**
  * LayerSlider
  * 
  * Setup for the layerslider to be used in
  * the stage and hero areas.
  * @package custom2015
  * @since brnm 2.1
 **/


if(brnm_session('show_slider_area', 'postmeta') == 'yes') : ?>
	<div id="layerslider" style="width: 100%; height: 390px;"><?php
		$slides = brnm_session('ls_slides', 'postmeta');
		
		for($s = 0; $s < $slides; $s++) {
			$slide_image = wp_get_attachment_image_src(brnm_session('ls_slides_'.$s.'_slide_image', 'postmeta'), 'layerslider');
			$slide_title = brnm_session('ls_slides_'.$s.'_slide_title', 'postmeta');
			$slide_content = brnm_session('ls_slides_'.$s.'_slide_content', 'postmeta');
			$slide_link = brnm_session('ls_slides_'.$s.'_slide_link', 'postmeta');
			$slide_anchor = brnm_session('ls_slides_'.$s.'_slide_anchor', 'postmeta');
			?>
			<div class="ls-slide" data-ls="slidedelay: <?php echo $slide_meta['ls_delay'][0]; ?>; transition2d: <?php echo $slide_meta['ls_transition'][0]; ?>;">
				<img src="<?php echo $slide_image[0]; ?>" class="ls-bg" alt="<?php echo $slide_title; ?>" />
				<div class="ls-l slide-caption" data-ls="" style=""><?php // <!-- edit the data-ls and styling as needed and delete this --> ?>
					<h3 class="slide-title"><?php echo $slide_title; ?></h3>
					<p class="slide-content"><?php echo $slide_content; ?></p>
					<?php if($slide_link) { ?>
						<a class="slide-link" href="<?php echo $slide_link; ?>"><span><?php echo $slide_anchor; ?></span></a>
					<?php } ?>
				</div><!-- .slide-caption -->
			</div><!-- .ls-slide -->
			<?php
		}
		?>
	</div><!-- #layerslider --><?php
	
	if($slides > 0) { ?>
		<script>
		jQuery(document).ready(function($) {
			$('#layerslider').layerSlider({
				skinsPath : '<?php echo BRNM_FRAME_INCLUDE_URI; ?>/js/layerslider/skins/',
				skin : 'noskin',
				showBarTimer : false,
				showCircleTimer : false
			});
		});
		</script><?php
	}
endif; ?>