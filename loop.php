<?php
/**
  * Loop
  *
  * Basic WordPress loop
  * @package custom2015
  * @lastmodified brnm 2.6.2
 **/ 


/* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<nav id="nav-above">
		<div class="section-heading visuallyhidden"><?php _e( 'Post navigation', 'brnm' ); ?></div>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'brnm' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'brnm' ) ); ?></div>
	</nav><!-- #nav-above -->
<?php endif; ?>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'brnm' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php brnm_print_meta(); ?>
		</header><!-- .entry-header -->

		<div class="entry-content entry-summary cf"><?php
			if ( is_archive() || is_search() ) : // Only display Excerpts for archives & search
				the_excerpt();
			else :
				if(has_post_thumbnail()) { ?><div class="post-image"><?php the_post_thumbnail('blog'); ?></div><!-- .post-image --><?php }
				brnm_the_excerpt();
			endif; ?>
		</div><!-- .entry-summary -->

	</article><!-- #post-<?php the_ID(); ?> -->

	<?php comments_template( '', true ); ?>

<?php endwhile; ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<nav id="nav-below">
		<div class="section-heading visuallyhidden"><?php _e( 'Post navigation', 'brnm' ); ?></div>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'brnm' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'brnm' ) ); ?></div>
	</nav><!-- #nav-below -->
<?php endif; ?>
