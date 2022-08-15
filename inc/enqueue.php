<?php
/**
 * Enqueue scripts and styles.
 *
 */

add_action( 'wp_enqueue_scripts', 'wpcleantheme_scripts' ); 
function wpcleantheme_scripts() {

  // Theme stylesheet
  wp_enqueue_style( 'main-style', get_stylesheet_uri() );
  // Custom stylesheet
  wp_enqueue_style( 'app', get_template_directory_uri() . '/assets/css/app.css' );
}