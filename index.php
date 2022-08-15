<?php
/*
 * Main template
 */
?>
<?php get_header(); ?>

<!-- <?php echo basename( __FILE__ ); ?> -->
  <main>
    <div class="container">
    <?php if ( have_posts() ) : ?>

      <!-- main loop -->
      <?php while ( have_posts() ) : 
        the_post();
        // rendering posts
        get_template_part( 'template-parts/content', get_post_format() );
      endwhile; ?>
      <!-- end main loop -->
    
    <?php else:
      // no posts
      get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>
    
    </div>
  </main>

<?php get_footer(); ?>