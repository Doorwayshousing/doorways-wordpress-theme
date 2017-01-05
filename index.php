<?php get_header(); ?>

<div class="title-text"><?php the_title(); ?></div>
<?php
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
  <div class="content-text"><?php the_content(); ?></div>
<?php endforeach;
wp_reset_postdata();?>

 <?php get_footer(); ?>
