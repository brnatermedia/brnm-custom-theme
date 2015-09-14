<?php
/**
  * Index
  *
  * Default page that loads on blogroll items
  * @package custom2015
 **/
 

get_header(); ?>

<main id="main" class="col-23 cf">

	<header class="entry-header">
		<h1 class="entry-title"><?php echo get_the_title(brnm_session('page_for_posts')); ?></h1>
	</header><!-- .entry-header -->

	<?php get_template_part( 'loop', 'index' ); ?>

</main><!-- #main -->

<?php get_footer(); ?>