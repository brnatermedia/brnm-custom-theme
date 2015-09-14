<?php
/**
  * Page Template
  *
  * Basic page setup
  * @package custom2015
 **/


get_header();

if(is_front_page()) { 
	include_once('part-front.php');
} else { ?>
	
	<main id="main" class="cf">
	
		<?php the_post(); ?>

		<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
	
			<div class="entry-content">
				<?php brnm_the_content(); ?>
			</div><!-- .entry-content -->

		</section><!-- #post-<?php the_ID(); ?> -->
	
	</main><!-- #main -->
	
	<?php get_footer();
} ?>