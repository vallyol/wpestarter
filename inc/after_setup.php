<?php
/**
 * Setup theme defaults and registers support for various WordPress features
 *
 */

function wpestarter_setup() {

  /* Page Title with custom separator and without blog-description on main page */
  add_theme_support( 'title-tag' );
  add_filter( 'document_title_separator', function(){ return ' | '; } );
  add_filter( 'document_title_parts', function( $title ) {
    if ( is_home() || is_front_page() ) {
      unset( $title['tagline'] );
    }
    return $title;
  });

  /* Another setup */
}
add_action( 'after_setup_theme', 'wpestarter_setup' );