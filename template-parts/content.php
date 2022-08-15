<?php
/**
 * Post template
 */
?>
<!-- <?php echo basename( __FILE__ ); ?> -->

<?php if ( is_single() ) { ?>
  <div>
    <?php the_post_thumbnail('full'); ?>
    <?php the_title( '<h1>', '</h1>' ); ?>
    <?php the_content(); ?>
  </div>
<?php } else { ?>
  <div>
    <?php the_post_thumbnail('full'); ?>
    <?php the_title( '<h2><a href="' . get_permalink() . '">', '</a></h2>' ); ?>
    <?php the_category( ' ' ); ?> / <?php echo get_the_date('M j, Y'); ?> 
  </div>
<?php } ?>