<?php
/**
  * Post Format - audio
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

<div class="entry-content content-audio">
	<?php
	global $is_chrome, $is_safari, $is_firefox, $is_IE, $is_opera;

	if($is_chrome || $is_firefox) {
		// chrome accepts mp3 and ogg
		$audio = (brnm_session('format_audio_link_mp3', 'postmeta') != '' ? brnm_session('format_audio_link_mp3', 'postmeta') : brnm_session('format_audio_link_ogg', 'postmeta'));
		$format = (brnm_session('format_audio_link_mp3', 'postmeta') != '' ? 'mp3' : 'ogg');
	}
	elseif($is_safari) {
		// safari accepts mp3 and wav
		$audio = (brnm_session('format_audio_link_mp3', 'postmeta') != '' ? brnm_session('format_audio_link_mp3', 'postmeta') : brnm_session('format_audio_link_wav', 'postmeta'));
		$format = (brnm_session('format_audio_link_mp3', 'postmeta') != '' ? 'mp3' : 'wav');
	}
	elseif($is_opera) {
		// opera accepts wav and ogg
		$audio = (brnm_session('format_audio_link_wav', 'postmeta') != '' ? brnm_session('format_audio_link_ogg', 'postmeta') : brnm_session('format_audio_link_ogg', 'postmeta'));
		$format = (brnm_session('format_audio_link_wav', 'postmeta') != '' ? 'wav' : 'ogg');
	}
	else {
		// catch all for the rest, including IE. mp3 only
		$audio = brnm_session('format_audio_link_mp3', 'postmeta');
	}
	$audio = wp_get_attachment_url($audio);
	?>
	<audio controls="true" autoplay="true">
		<source src="<?php echo $audio; ?>" type="audio/<?php echo $format; ?>">
		<i>Your browser does not support HTML5 audio.<br />You may wish to upgrade your browser.</i>
	</audio>
</div><!-- .entry-content -->


<div class="entry-content">
	<?php the_content(); ?>
</div><!-- .entry-content -->

<?php brnm_print_footer_meta(); ?>