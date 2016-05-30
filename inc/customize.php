<?php
/**
 * Handles the theme's customizer functionality
 *
 * @package Taylor
 */

 if ( ! class_exists( 'WP_Customize_Control' ) )
   return NULL;

 function taylor_customize_register( $wp_customize ) {

   $wp_customize->add_section( 'taylor_customize', array(
     'title'     => __( 'Site Logo', 'taylor' ),
     'priority'  => 1
   ) );

   $wp_customize->add_setting( 'taylor_customize_logo', array(
     'sanitize_callback' => 'esc_url_raw'
   ) );

   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'taylor_customize_logo', array(
     'label'     => __( 'Logo Upload', 'taylor' ),
     'section'   => 'taylor_customize',
     'settings'  => 'taylor_customize_logo'
   ) ) );
 }

 add_action( 'customize_register', 'taylor_customize_register' );
