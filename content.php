<?php 
/**
  * Post Format - standard
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

<div class="entry-content">
	<?php the_content(); ?>
</div><!-- .entry-content -->

<?php brnm_print_footer_meta(); ?>