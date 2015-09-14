<?php 
/**
  * Post Format - video
  *
  * Used to show individual posts
  * @package custom2015
  * @lastmodified brnm 2.6.2
 **/


?>
<header class="entry-header">
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php brnm_print_meta(); ?>
</header><!-- .entry-header -->

<div class="entry-content content-video"><?php
	$video_type = brnm_session('format_video_type', 'postmeta'); // embed or upload

	if($video_type == 'embed') {
		$video = apply_filters('the_content', brnm_session('format_video_embed', 'postmeta'));
	} else { //otherwise, it's upload
		global $is_firefox, $is_opera;
		$video_file = null;
		if($is_firefox || $is_opera) { $video_file = wp_get_attachment_url(brnm_session('format_video_ogg', 'postmeta')); }
		else { $video_file = wp_get_attachment_url(brnm_session('format_video_mp4', 'postmeta')); }

		$video = '<video src="'.$video_file.'" controls="true" height="360"></video>';
	}
	
	echo $video;
	
	// finish building the output here ?>
</div><!-- .entry-content -->

<div class="entry-content">
	<?php the_content(); ?>
</div><!-- .entry-content -->

<?php brnm_print_footer_meta(); ?>