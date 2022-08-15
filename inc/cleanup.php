<?php
/**
 * Cleanup the theme
 *
 */ 

/* WP Emoji */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/* gutenberg - global-styles-inline-css */
function remove_wp_block_library_css(){
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-block-style' ); // REMOVE WOOCOMMERCE BLOCK CSS
  wp_dequeue_style( 'global-styles' ); // REMOVE THEME.JSON 
  }
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );

/* dns-prefetch */
remove_action( 'wp_head', 'wp_resource_hints', 2);

/* RSD link */
remove_action('wp_head', 'rsd_link');

/* wlmanifest link */
remove_action('wp_head', 'wlwmanifest_link');

/* delete a meta generator */
function wpcleantheme_remove_meta_version() {
  return '';
}
add_filter( 'the_generator', 'wpcleantheme_remove_meta_version' ); 

/* Delete a version number */
function wpcleantheme_remove_wp_version_strings( $src ) {
  global $wp_version;
  parse_str( parse_url($src, PHP_URL_QUERY), $query );
  if ( !empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
      $src = remove_query_arg( 'ver', $src );
  }
  return $src;
}
add_filter( 'script_loader_src', 'wpcleantheme_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'wpcleantheme_remove_wp_version_strings' );

/* remove empty P tags */
function remove_empty_paragraphs( $content ) {
  $content = preg_replace('/<p>(?:\s|&nbsp;)*?<\/p>/i', '', $content);
  return $content;
}
add_filter( 'the_content', 'remove_empty_paragraphs', 999 );