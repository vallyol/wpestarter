<?php
/**
 * Page template
 */
?>
<?php 
$classes = 'page';
?>

<?php get_header(); ?>

<!-- <?php echo basename( __FILE__ ); ?> -->
<main class="<?php echo $classes; ?>">
  <div class="container">
  <?php if ( have_posts() ) : ?>
    <!-- main loop -->
    <?php while ( have_posts() ) : 
      the_post();
      // rendering posts
      the_title( '<h1 class="page-title">', '</h1>' );
      the_content();
    endwhile; ?>
    <!-- end main loop -->
  <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>