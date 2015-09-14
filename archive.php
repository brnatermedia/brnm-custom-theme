<?php
/**
  * Archive Template
  *
  * Blog roll of archived posts
  * @package custom2015
 **/


get_header(); ?>

<main id="main" class="col-23 cf">

	<?php the_post(); ?>

	<header class="entry-header">
		<h1 class="entry-title">
			<?php if ( is_day() ) : ?>
				Daily Archives
			<?php elseif ( is_month() ) : ?>
				Monthly Archives
			<?php elseif ( is_year() ) : ?>
				Yearly Archives
			<?php else : ?>
				<?php echo get_the_title( get_option('page_for_posts')); ?>
			<?php endif; ?>
		</h1>
	</header>

	<?php rewind_posts(); ?>

	<?php get_template_part( 'loop', 'archive' ); ?>

</main><!-- #main -->

<?php get_footer(); ?>