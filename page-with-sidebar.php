<?php
/**
  * Template Name: Page with Sidebar
  * Description: A full-width template with no sidebar
  *
  * @package custom2015
 **/


get_header();

if(is_front_page()) { 
	include_once('part-front.php');
} else { ?>

	<main id="main" class="col-23 cf">
	
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
