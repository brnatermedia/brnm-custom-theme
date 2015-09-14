<?php
/**
  * 404
  *
  * Page not found
  * @package custom2015
 **/


get_header(); ?>

<main id="main" class="col-23 cf">

	<div id="post-0" class="post error404 not-found">
		<header class="entry-header">
			<h1 class="entry-title">404 Page Not Found</h1>
		</header>

		<div class="entry-content">
			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'brnm' ); ?></p>

			<?php get_search_form(); ?>

			<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

			<div class="widget">
				<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'brnm' ); ?></h2>
				<ul>
				<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 'TRUE', 'title_li' => '', 'number' => '10' ) ); ?>
				</ul>
			</div>

			<?php
			$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'brnm' ), convert_smilies( ':)' ) ) . '</p>';
			the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
			?>

			<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

		</div><!-- .entry-content -->
	</div><!-- #post-0 -->

</main><!-- #main -->

<?php get_footer(); ?>