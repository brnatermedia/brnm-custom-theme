<?php
/**
  * Category Template
  *
  * Displays category blog roll posts
  * @package custom2015
 **/


get_header(); ?>

<main id="main" class="col-23 cf">

	<header class="entry-header">
		<h1 class="entry-title"><?php
			printf( __( 'Category Archives: %s', 'brnm' ), '<span>' . single_cat_title( '', false ) . '</span>' );
		?></h1>
		<?php $categorydesc = category_description(); if ( ! empty( $categorydesc ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
	</header>

	<?php get_template_part( 'loop', 'category' ); ?>

</main><!-- #main -->

<?php get_footer(); ?>