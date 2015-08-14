<?php
/**
 * Adjustments to the default Hybrid Core attribute functions
 *
 * @package Taylor
 * 
 */

function taylor_attr_header( $attr ) {
  $attr['id']     = 'masthead';
  $attr['class']  = 'site-header';

  return $attr;
}
add_filter( 'hybrid_attr_header', 'taylor_attr_header' );

function taylor_attr_footer( $attr ) {
  $attr['id']     = 'colophon';
  $attr['class']  = 'site-footer';

  return $attr;
}
add_filter( 'hybrid_attr_footer', 'taylor_attr_footer' );

function taylor_attr_content( $attr ) {
  $attr['id']     = 'main';
  $attr['class']  = 'site-main';

  return $attr;
}
add_filter( 'hybrid_attr_content', 'taylor_attr_content' );

function taylor_attr_sidebar( $attr, $context ) {
  $class = 'sidebar widget-area';

  if ( ! empty( $context ) ) {
    $class .= " sidebar-{$context}";
  }

  if ( 'subsidiary' === $context ) {
    global $sidebars_widgets;

    if ( is_array( $sidebars_widgets ) && !empty( $sidebars_widgets[ $context ] ) ) {

      $count = count( $sidebars_widgets[ $context ] );

      if ( 1 === $count )
        $class .= ' sidebar-col-1';

      elseif ( !( $count % 3 ) || $count % 2 )
        $class .= ' sidebar-col-3';

      elseif ( !( $count % 2 ) )
        $class .= ' sidebar-col-2';
    }
  }

  $attr['class'] = $class;

  if ( $context === 'primary' ) {
    $attr['id'] = 'secondary';
  }

  return $attr;
}
add_filter( 'hybrid_attr_sidebar', 'taylor_attr_sidebar', 10, 2 );

function taylor_attr_menu( $attr, $context ) {
  $class = 'navigation';

  if ( ! empty( $context ) ) {
    $class .= " {$context}-navigation";
  }

  if ( $context === 'primary' ) {
    $attr['id'] = 'site-navigation';
    $class .= " main-navigation";
  }

  $attr['class'] = $class;

  return $attr;
}
add_filter( 'hybrid_attr_menu', 'taylor_attr_menu', 10, 2 );

function taylor_attr_branding( $attr ) {
  $attr['class']  = 'site-branding';

  return $attr;
}
add_filter( 'hybrid_attr_branding', 'taylor_attr_branding' );

function taylor_attr_site_title( $attr ) {
  $attr['class'] = 'site-title';

  return $attr;
}
add_filter( 'hybrid_attr_site-title', 'taylor_attr_site_title' );

function taylor_attr_site_description( $attr ) {
  $attr['class'] = 'site-description';

  return $attr;
}
add_filter( 'hybrid_attr_site-description', 'taylor_attr_site_description', 10 );

function taylor_attr_entry_published( $attr ) {
  $attr['class'] = 'entry-date published updated';

  return $attr;
}
add_filter( 'hybrid_attr_entry-published', 'taylor_attr_entry_published' );
