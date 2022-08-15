<?php
/**
 * 404 template
 */
?>
<?php 
$classes = 'not-found';
?>

<?php get_header(); ?>

<!-- <?php echo basename( __FILE__ ); ?> -->
<main class="<?php echo $classes; ?>">
  <div class="container">
  
    <h1 class="page-title text-center">Ooops! Page Not Found</h1>
    
  </div>
</main>

<?php get_footer(); ?>