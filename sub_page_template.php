<?php
/*
Template Name: Sub Page
*/
 get_header(); ?>
<div id="page-content-container">
   <div id="page-content-banner">
       <div id="banner-title-text">
           <?php wp_title(''); ?>
       </div>
   </div>
   <div id="page-content-body">
       <div class="content-text">
         <?php if (have_posts()) : while (have_posts()) : the_post();?>
           <?php the_content(); ?>
         <?php endwhile; endif; ?>
       </div>
   </div>
</div>
 <?php get_footer(); ?>
