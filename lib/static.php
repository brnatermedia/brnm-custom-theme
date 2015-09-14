<?php
/**
  * Static Header Image
  *
  * @package custom2015
 **/


global $is_mobile, $is_iphone, $is_android_device; ?>

<div class="post-image"><?php
	$page_id = (is_home() ? brnm_session('page_for_posts') : get_the_ID());
	
	if($is_iphone || ($is_mobile && $is_android_device)) {
		echo get_the_post_thumbnail($page_id, 'mobile-header');
	} else {
		$interior = (is_front_page() ? '' : '-interior');
		echo get_the_post_thumbnail($page_id, 'header-image'. $interior);
	}
	if(brnm_session('header_text_show', 'postmeta', $page_id) == 'yes') : ?>
		<div class="header-title-wrap">
			<div class="wrap">
				<div class="header-title"><?php echo apply_filters('the_content', brnm_session('header_text', 'postmeta', $page_id)); ?></div><!-- .header-title -->
			</div><!-- .wrap -->
		</div><!-- .header-title-wrap --><?php
	endif; ?>
</div><!-- .post-image -->
