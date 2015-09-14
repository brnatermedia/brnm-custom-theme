<?php
/**
  * Tag
  *
  * The template used to display Tag Archive pages
  * @package custom2015
 **/


get_header(); ?>

<main id="main">

	<?php the_post(); ?>

	<header class="entry-header">
		<h1 class="entry-title">Tags</h1>
	</header>

	<?php rewind_posts(); ?>

	<?php get_template_part( 'loop', 'tag' ); ?>

</div><!-- #main -->

<?php get_footer(); ?>