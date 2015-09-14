<?php
/**
  * Theme Functions
  *
  * Calls in the brnm-framework functions.
  * no need to make any edits to this file
  *
  * @package custom2015
  * @since brnm-framework 0.1
  * @since custom2015 1.0
  * @lastmodified brnm-framework 2.6.4
 **/


/* Include Theme Presets
 * @since brnm-framework 2.6.4
-------------------------------------------------------- */
require_once( get_template_directory() .'/theme-presets.php' );


/* More acf options pages
 * @since brnm-framework 2.5
-------------------------------------------------------- */
$custom_pages = array(); // Add page titles as strings to this array
BRNM_ACF_SETUP::register_options_pages($custom_pages);


/* More widget areas
 * @since brnm-framework 2.5
 * @param $more_widget_areas => array
-------------------------------------------------------- */
$more_widget_areas = array(); // Add widget area names as strings to this array
brnm_build_widgets($more_widget_areas);


/* Include Custom post types
 * @since brnm-framework 2.3
 * @lastmodified brnm-framework 2.5
-------------------------------------------------------- */
//include_once('lib/cpt-EXAMPLE.php');
//include_once('lib/cpt-EXAMPLE.php');


/* Update the content width
 * @since brnm-framework 2.3
-------------------------------------------------------- */
//$content_width = 640;


/* Post Thumbnails
 * @since brnm-framework 2.4
-------------------------------------------------------- */
// Control which post types can support this. Add any specific custom post types you want to allow
// ( remember commas & no comma on last )
global $brnm_thumbnail_support;
if(!$brnm_thumbnail_support ) {
	$brnm_thumbnail_support = array(
		'post',
		'page'
	);
}
add_theme_support('post-thumbnails', $brnm_thumbnail_support);


/* Add Google Fonts, as desired
 * @lastmodified brnm-framework 2.5
/* @param $google_fonts => string, array
-------------------------------------------------------- */
// Add URL from the Google Font <link> method into the array below ( *** use https in URL )
// Adding too many can slow down the load time of the website
$google_fonts = "https://fonts.googleapis.com/css?family=Open+Sans:400,700|Oswald:400,700";  // Remember, no comma at the end of the last one!
//brnm_add_google_fonts($google_fonts);


/* Register desired menus
 * @since brnm-framework 1.0
-------------------------------------------------------- */
function brnm_register_menus() {
	register_nav_menus( array(
		'primary'	=> 'Primary Menu',
		'utility'	=> 'Utility Menu',
		'footer'	=> 'Footer Menu',
	) );
}
add_action( 'init', 'brnm_register_menus' );


/* Custom image sizes
 * @since brnm-framework 0.1
 * @lastmodified brnm-framework 2.6.4
-------------------------------------------------------- */
add_image_size( 'logo-front', 1000, 190 );
add_image_size( 'layerslider', 1000, 390, true );
add_image_size( 'blog', 1024, 1024);
//add_image_size( 'owlcarousel', 250, 190, true );
//add_image_size( 'header-image', 1000, 190, true );
//add_image_size( 'mobile-header', 1000, 190, true );


/* Register additional sidebars
 * @in development
-------------------------------------------------------- */
// in development. create new array w/new variable name and push those items
// to the original array in lib/sidebars.php, then run those functions to register
// any needed sidebars. Step 2: enable theme file sidebar.php to take a chosen sidebar
// and add a switch for a meta box in the edit page that shows up when new sidebars are added here.
/*
global $brnm_default_sidebars;
$brnm_default_sidebars = array(); // add custom sidebar areas here
brnm_create_widget_areas(); // do not delete
*/


/* Change Excerpt Length and ending
 * @since brnm-framework 2.1
 *
 * @param $length - int => the original word count
 * @param $more - string => content that proceeds the excerpt
-------------------------------------------------------- */
function brnm_excerpt_length( $length ) {
	return 45;
}
add_filter( 'excerpt_length', 'brnm_excerpt_length', 999 );

function brnm_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'brnm_excerpt_more');


/* Entry meta
 * @since brnm-framework 2.5.2
 * @lastmodified brnm-framework 2.6.1
-------------------------------------------------------- */
function brnm_print_meta($show_author = true, $show_date = true) {
	$display  = '<div class="entry-meta cf">';
	$display .= '<div class="meta-author">';
	if($show_author) {
		$display .= 'By <a href="">'. get_the_author() .'</a>';
	}
	if($show_date) {
		$display .= ' posted on <span class="meta-date">'. get_the_date() .'</span>';
	}
	$display .= '</div>';
	$display .= '</div><!-- .entry-meta -->';

	echo $display;
}


/* Footer Entry meta
 * @since brnm-framework 2.6.2
-------------------------------------------------------- */
function brnm_print_footer_meta() {

	echo '<footer class="entry-meta">';

	$tag_list = get_the_tag_list( '', ', ' );
	if ( '' != $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s.', 'brnm' );
	} else {
		$utility_text = __( 'This entry was posted in %1$s.', 'brnm' );
	}
	printf(
		$utility_text,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);

	echo '</footer><!-- .entry-meta -->';

}


/* Content button shortcode
 * @since brnm-framework 2.5.2
 * @lastmodified brnm-framework 2.5.4
 *
 * @update 2.5.4 creates a shortcode based on the TinyMCE
 *	plugins added in 2.5.4. Size and class attributes removed.
-------------------------------------------------------- */
add_shortcode('button', 'brnm_sc_button');
function brnm_sc_button($atts, $content = null) {

	$atts = shortcode_atts(
		array(
			'href' => '#',
			'color' => '' // background color
		), $atts
	);

	// cleaning up some of the user submitted info
	if($atts['href'] != "#") { $atts['href'] = esc_url($atts['href']); } //clean up the url

	//reset the color if it's not one of the acceptable color
	$acceptable_colors = array('red', 'yellow', 'green', 'blue', 'brown', 'purple', 'orange');
	if((!in_array($atts['color'], $acceptable_colors)) || !strpos($atts['color'], '#')) { $atts['color'] = 'nocolor'; }

	$click = brnm_get_gaevent('Content Button', 'click', $content, '', true);
	$button = '<a '. $click .' href="'. $atts['href'] .'" class="button white bg-'. $atts['color'] .'">'. $content .'</a>';
	return $button;
}


/* Content area for all page templates
 * @since brnm-framework 2.5.4
 *
 * displays a certain layout (based on filename) per page part
-------------------------------------------------------- */
function brnm_the_content() {
	global $post;
	switch($post->ID) {
		case brnm_session('options_page_example'):
			the_content();
			include_once(get_template_directory() .'/part-example.php');
		break;
		default:
			the_content();
		break;

	}
}


/* Contact Page Map
 * @since brnm-framework 2.6
 *
 * Display a google map
-------------------------------------------------------- */
function brnm_google_map($address, $map_id = '') {
	if($address) {
		$map_id = ($map_id ? $map_id : 'google-map');
		//function that returns the lat lng of a raw address
		$coordinates = false;
		$coordinates = geocodeAddy($address);

		if($coordinates) {
			$map = '<script src="http://maps.googleapis.com/maps/api/js"></script>';
			$map.= '<script type="text/javascript">';
			$map.= '
			function initialize() {

					var mapProp = {
						center: new google.maps.LatLng('. $coordinates['lat'] .', '. $coordinates['lng'] .'),
						zoom: 14,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};

					var map = new google.maps.Map(document.getElementById("'. $map_id .'"),mapProp);

					var marker = new google.maps.Marker({
						position: new google.maps.LatLng('. $coordinates['lat'] .', '. $coordinates['lng'] .')
						//animation: google.maps.Animation.BOUNCE
					});
					marker.setMap(map);

				}
				google.maps.event.addDomListener(window, \'load\', initialize);
			</script>';

			// NOTE: don't forget to give the map a width and height so it'll display
			$map .= '<div id="'. $map_id .'" class="map"></div>';

			echo $map;

		}

		else {
			echo 'error1';
		}
	} else {
		echo 'no office address to show';
	}
}