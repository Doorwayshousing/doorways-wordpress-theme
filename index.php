<?php get_header(); ?>

<div id="single-post-cont">
    <div class="title-text <?php $category = get_the_category(); $firstCategory = $category[0]->cat_name; echo $firstCategory; ?>"><h1><?php the_title(); ?></h1></div>
    <div class="content-text">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
      <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail();
      } else { ?>
          <img src="<?php bloginfo('template_directory'); ?>/img/gradient-banner.jpg" alt="<?php the_title(); ?>" />
      <?php } ?>
    </div>
</div>

<?php get_footer(); ?>
