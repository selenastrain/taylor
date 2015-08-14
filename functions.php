<?php
/**
 * Taylor functions and definitions
 *
 * @package Taylor
 */

$taylor_dir = trailingslashit( get_template_directory() );

// Load Hybrid Core and launch it.
require_once( $taylor_dir . 'library/hybrid.php' );
new Hybrid();

// Load theme-specific files
require_once( $taylor_dir . 'inc/attr.php' );

if ( ! function_exists( 'taylor_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function taylor_setup() {

	require_once( trailingslashit( get_template_directory() ) . 'inc/theme.php' );

	// Theme Layouts
	add_theme_support(
		'theme-layouts',
		array(
			'1c'				=> __( '1 Column Wide', 								'taylor' ),
			'1c-narrow' => __( '1 Column Narrow', 							'taylor' ),
			'2c-l'			=> __( '2 Columns: Content / Sidebar', 	'taylor' ),
			'2c-r'			=> __( '2 Columns: Sidebar / Content', 	'taylor' ),
		),
		array( 'default' => is_rtl() ? '2c-r' : '2c-l' )
	);

	// Load stylesheets
	add_theme_support(
		'hybrid-core-styles',
		array( 'style', 'google-fonts', 'font-awesome' ) 
	);

	// Enable custom template hierarchy
	add_theme_support( 'hybrid-core-template-hierarchy' );

	add_theme_support( 'get-the-image' );

	add_theme_support( 'breadcrumb-trail' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	* Enable support for Post Formats.
	* See http://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'image', 'gallery', 'link', 'quote', 'status', 'video'
	) );

	// Handles content width for embeds and images
	// Larget size based on the theme's layouts
	hybrid_set_content_width( 1140 );
}
endif; // taylor_setup
add_action( 'after_setup_theme', 'taylor_setup' );
