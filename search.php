<?php 
/**
  * Search
  *
  * Displays search results
  * @package custom2015
 **/


get_header(); ?>

<main id="main" class="col-23 cf"><?php
	
	if ( have_posts() ) : ?>

		<header class="entry-header">
			<h1 class="entry-title">Search</h1>
		</header>

		<?php get_template_part( 'loop', 'search' ); ?>

	<?php else : ?>

		<section id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found Matching Your Search', 'brnm' ); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'brnm' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
		</section><!-- #post-0 -->

	<?php endif; ?>

</main><!-- #main -->

<?php get_footer(); ?>