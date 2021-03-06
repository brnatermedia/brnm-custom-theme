<?php
/**
  * Author Template
  *
  * Displays the author layout
  * @package custom2015
 **/


get_header(); ?>

<main id="main" class="col-23 cf">

	<?php the_post(); ?>

	<header class="entry-header">
		<h1 class="entry-title author"><?php printf( __( 'Author Archives: <span class="vcard">%s</span>', 'brnm' ), get_the_author() ); ?></h1>
		<?php $author_bio = get_the_author_meta( 'description', $post->post_author ); if( $author_bio ) : ?>
		<div id="author-bio">
			<h2>About the Author</h2>
			<?php echo wpautop( $author_bio ); ?>
		</div>
		<?php endif; ?>
	</header>

	<?php rewind_posts(); ?>

	<?php get_template_part( 'loop', 'author' ); ?>

</main><!-- #main -->

<?php get_footer(); ?>