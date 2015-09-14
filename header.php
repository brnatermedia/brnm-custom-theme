<?php
/**
  * Header
  *
  * Page header
  * @package custom2015
  * @package brnm-framework
  * @lastmodified brnm 2.6.4
 **/


include_once(ABSPATH .'/wp-content/plugins/brnm-framework/head.php'); ?>

<body <?php body_class(); ?>>
<?php do_action('body_open'); ?>

<div id="outer">
<div id="inner">
<div id="container" class="hfeed cf">
	<header id="page-header" role="banner">
		<div class="header-top">
			<div class="page-header-wrap wrap cf">

				<div id="branding">
					<div id="site-title"><?php brnm_the_logo(0.8); ?></div><!-- .site-title -->
				</div><!-- #branding -->

				<?php if( has_nav_menu( 'utility' ) ) : ?>
				<nav id="nav-utility1" class="nav-utility">
					<?php wp_nav_menu( array( 'theme_location' => 'utility', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
				</nav><!-- #nav-utility -->
				<?php endif; ?>

				<div class="tabletview mobileview"><div id="nav-click"><a href="#"><span class="ir">close</span></a></div></div><!-- .tabletview mobileview -->
				<nav id="nav-primary1" class="nav-primary">
					<div class="section-heading visuallyhidden"><?php _e( 'Main menu', 'brnm' ); ?></div>
					<div class="skip-link visuallyhidden"><a href="#main" title="<?php esc_attr_e( 'Skip to content', 'brnm' ); ?>"><?php _e( 'Skip to content', 'brnm' ); ?></a></div>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
				</nav><!-- #nav-primary -->
			</div><!-- .page-header-wrap -->
		</div><!-- .header-top -->


		<div class="header-bottom wrap">
			<div class="stage"><?php
				if(is_front_page()) {
					$slider_options = brnm_session('options_media_type');
					switch($slider_options) {
						case 'layerslider': include_once(get_template_directory().'/lib/layerslider.php'); break;
						case 'owlcarousel': include_once(get_template_directory().'/lib/owlcarousel.php'); break;
						case 'mosaic': include_once(get_template_directory().'/lib/mosaic.php'); break;
						case 'static': include_once(get_template_directory().'/lib/static.php'); break;
					}
				} else {
					if(get_the_ID() == brnm_session('options_page_contact') && brnm_session('options_default_address')) {
						brnm_google_map(brnm_session('options_office_address'), 'contact-map');
					}
					elseif(has_post_thumbnail()) {
						include_once(get_template_directory().'/lib/static.php');
					}
				} ?>
			</div><!-- .stage -->
		</div><!-- .header-bottom -->
	</header><!-- #page-header -->

	<div id="content">
	<div id="content-wrap" class="wrap cf">