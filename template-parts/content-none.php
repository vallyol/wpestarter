<?php
/**
 * Template part for No Contents case
 */
?>

<!-- <?php echo basename( __FILE__ ); ?> -->
<?php  
  if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
    <p>Ready to publish your first post? <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ) ?>">Get started here</a>...</p>
  <?php 
  else : ?>
    <p>На сайте не создано ни одного материала</p>
  <?php
  endif;
?> 