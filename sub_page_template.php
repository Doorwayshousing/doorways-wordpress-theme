<?php
/*
Template Name: Sub Page
*/
 get_header(); ?>
<div id="page-content-cont">
   <h1><?php wp_title(''); ?></h1>
   <div class="content-text">
     <?php if (have_posts()) : while (have_posts()) : the_post();?>
       <?php the_content(); ?>
     <?php endwhile; endif; ?>
   </div>
</div>



 <?php get_footer(); ?>
