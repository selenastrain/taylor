<?php
/**
 * Sets up custom filters and actions for the theme. Sets up sidebars, menus, scripts, etc.
 *
 * @package   Taylor
 * @author    Selena Strain <s@selenastrain.com>
 * @copyright Copyright (c) 2015, Selena Strain
 * @link      http://selenastrain.com/themes/taylor
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

function taylor_register_image_sizes() {
  set_post_thumbnail_size( 175, 131, true );
  add_image_size( 'taylor-full', 1025, 500, true );
}
add_action( 'init', 'taylor_register_image_sizes' );

function taylor_register_menus() {
  register_nav_menu( 'primary',     _x( 'Primary',    'nav menu location', 'taylor' ) );
  register_nav_menu( 'subsidiary',  _x( 'Subsidiary', 'nav menu location', 'taylor' ) );
}
add_action( 'init', 'taylor_register_menus' );

function taylor_register_sidebars() {

  hybrid_register_sidebar(
    array(
      'id'            => 'primary',
      'name'          => _x( 'Primary', 'sidebar', 'taylor' ),
      'description'   => __( 'The main sidebar. Displayed on either the left or right side of the page depending on the selected layout.', 'taylor' )
    )
  );

  hybrid_register_sidebar(
    array(
      'id'             => 'subsidiary',
      'name'          => _x( 'Subsidiary', 'sidebar', 'taylor' ),
      'description'   => __( 'A sidebar located in the footer of the site. It is optimized for three footer widgets.', 'taylor' )
    )
  );
}
add_action( 'widgets_init', 'taylor_register_sidebars' );

function taylor_register_layouts() {

  $image_dir = trailingslashit( get_template_directory_uri() ) . 'assets/images/';

  hybrid_register_layout(
    '1c',
    array(
      'label'             => _x( '1 Column Wide', 'theme layout', 'taylor' ),
      'is_global_layout'  => true,
      'is_post_layout'    => true,
      'image'             => $image_dir . 'layout-width-full.svg'
    )
  );

  hybrid_register_layout(
    '1c-narrow',
    array(
      'label'             => _x( '1 Column Narrow', 'theme layout', 'taylor' ),
      'is_global_layout'  => true,
      'is_post_layout'    => true,
      'image'             => $image_dir . 'layout-width-default.svg'
    )
  );

  hybrid_register_layout(
    '2c-l',
    array(
      'label'             => _x( '2 Columns: Content / Sidebar', 'theme layout', 'taylor' ),
      'is_global_layout'  => true,
      'is_post_layout'    => true,
      'image'             => $image_dir . 'layout-sidebar-right.svg'
    )
  );

  hybrid_register_layout(
    '2c-r',
    array(
      'label'             => _x( '2 Columns: Sidebar / Content', 'theme layout', 'taylor' ),
      'is_global_layout'  => true,
      'is_post_layout'    => true,
      'image'             => $image_dir . 'layout-sidebar-left.svg'
    )
  );
}
add_action( 'hybrid_register_layouts', 'taylor_register_layouts' );

function taylor_enqueue_scripts() {
  $js_dir = trailingslashit( get_template_directory_uri() ) . 'assets/js/';

  wp_enqueue_script( 'taylor-js', $js_dir . 'theme.js', array( 'jquery' ), '20150412', true );
  wp_enqueue_script( 'taylor-skip-link-focus-fix', $js_dir . 'skip-link-focus-fix.js', array(), '20130115', true );
}
add_action( 'wp_enqueue_scripts', 'taylor_enqueue_scripts' );

function taylor_register_styles() {
  $css_dir = trailingslashit( get_template_directory_uri() ) . 'assets/css/';

  wp_enqueue_style( 'hybrid-style' );
  wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' );
  wp_enqueue_style( 'font-awesome', $css_dir . 'font-awesome.min.css' );

}
add_action( 'wp_enqueue_scripts', 'taylor_register_styles', 4 );

/**
 * Adds site logo from customizer options if available, defaults to site title.
 */
function taylor_get_logo() {
  $output = '';

  if ( get_theme_mod( 'taylor_customize_logo' ) ) {
    $output = '<h1 class="site-logo">';
    $output .= '<a href="' . esc_url( home_url( '/' ) ) .'" rel="home"><img src="' . esc_url( get_theme_mod( 'taylor_customize_logo' ) ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) .'" class="site-logo-image"/></a>';
    $output .= '</h1>';
  } else {
    $output = hybrid_site_title();
  }

  echo $output;

  // TODO: add apply_filters and docs on how to use
}

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function taylor_jetpack_setup() {
  // Return early if Jetpack isn't activated.
  if ( ! class_exists( 'Jetpack' ) )
    return;

  add_theme_support( 'infinite-scroll', array(
    'container' => 'main',
    'footer'    => 'page',
  ) );
}
add_action( 'after_setup_theme', 'taylor_jetpack_setup' );
