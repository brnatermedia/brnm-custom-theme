<?php
/**
  * Custom Post Type for [name]
  *
  * Register post type and custom items relating
  * for the theme
  * @package custom2015
  * @lastmodified brnm 2.5
 **/


/* Name post type
 * @since brnm 2.1
 * @since custom2015
-------------------------------------------------------- */
add_action( 'init', 'brnm_doctors_post_type' );
function brnm_doctors_post_type() {
	
	$singular = 'Doctor'; $plural = 'Doctors';
	
	$labels = array(
		'name' => _( $plural ), // plural form of post name
		'singular_name' => __( $singular ), // singular form of post name
		'add_new' => __( 'Add New '. $singular ), // menu item for adding a new post
		'add_new_item' => __( 'New '. $singular ), // header shown when creating a new post
		'edit' => __( 'Edit '. $singular ), // menu item for editing posts
		'edit_item' => _( 'Edit this '. $singular ), // header shown when editing a post
		'new_item' => __( 'New '. $singular ), // Shown in the favorites menu in the admin header
		'view' => __( 'View this '. $singular ), // Used as text in a link to view the post
		'view_item' => __( 'View '. $singular ), // Shown alongside the permalink on the edit post screen
		'search_items' => __( 'Search all '. $plural ), // Button text for the search box on the edit posts screen
		'not_found' => __( 'There are no '. $plural .' yet.' ), // Text to display when no posts are found through search in the admin
		'not_found_in_trash' => __( 'No '. $plural .' found in trash.' ), // Text to display when no posts are in the trash
	);

	register_post_type(str_replace(' ', '-', strtolower($plural)),
		array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => false,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'comments', 'revisions')
		)
	);
	
	// albums taxonomy for music tracks
	$tax_singular = 'CD Album'; $tax_plural = 'CD Albums';

	$tax_args = array(
		'label' => _( $tax_singular ),
		'labels' => array(
			'name' => _( $tax_plural ), // plural form of post name
			'singular_name' => __( $tax_singular ), // singular form of post name
			'add_new' => __( 'Add New '. $tax_singular ), // menu item for adding a new post
			'add_new_item' => __( 'New '. $tax_singular ), // header shown when creating a new post
			'edit' => __( 'Edit '. $tax_singular ), // menu item for editing posts
			'edit_item' => _( 'Edit this '. $tax_singular ), // header shown when editing a post
			'new_item' => __( 'New '. $tax_singular ), // Shown in the favorites menu in the admin header
			'view' => __( 'View this '. $tax_singular ), // Used as text in a link to view the post
			'view_item' => __( 'View '. $tax_singular ), // Shown alongside the permalink on the edit post screen
			'search_items' => __( 'Search all '. $tax_plural ), // Button text for the search box on the edit posts screen
			'not_found' => __( 'There are no '. $tax_plural .' yet.' ), // Text to display when no posts are found through search in the admin
			'not_found_in_trash' => __( 'No '. $tax_plural .' found in trash.' ), // Text to display when no posts are in the trash
		),
		'hierarchical' => true
	);

	//register_taxonomy( str_replace(' ', '-', strtolower( $tax_plural )), str_replace(' ', '-', strtolower($plural)), $tax_args );
}


/* NAME shortcode
 * @since brnm 2.5.2
 * @lastmodified brnm 2.6
 * @since custom2015 1.0
-------------------------------------------------------- */
//add_shortcode('doctors', 'brnm_sc_doctors'); // CHANGE
function brnm_sc_doctors($atts) { // CHANGE
	$atts = shortcode_atts(
		array(
			'posts_per_page' => -1,
			'order' => 'title'
		),
		$atts
	);
	
	$query = get_posts(array(
		'post_type' => 'doctors', // CHANGE
		'posts_per_page' => $atts['posts_per_page'],
		'order' => $atts['order']
	));
	
	foreach($query as $post) {
		$meta = get_post_custom($post->ID);
		$output .= '';
	}
	
	return $output;
}

?>