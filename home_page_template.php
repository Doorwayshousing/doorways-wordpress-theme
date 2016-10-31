<?php
/*
Template Name: Doorways Home Page
*/
 get_header(); ?>
 <div class="homepage-banner">
     <div class="cover"></div>
     <div class="tagline">
         <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/tagline.png">
     </div>
     <div class="scroll-down">
        scroll to learn more <br/>
         <i class="fa fa-angle-double-down bounce"></i>
     </div>
 </div>
 <div class="ne-container">
     <div class="ne-header">
         <div class="news-icon">
             <i class="fa fa-newspaper-o"></i>
         </div>
         <div class="events-icon">
             <i class="fa fa-calendar"></i>
         </div>
         <div class="ne-title">
             News & Events
         </div>
     </div>
     <div class="ne-body">
         <ul>
                 <?php
            $args = array( 'posts_per_page' => 3, 'category_name' => 'News,Events' );
            $myposts = get_posts( $args );
            foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                 <li style="background: url(<?php the_post_thumbnail_url('medium');?>)no-repeat center center; background-size:cover;">
                     <a href="<?php the_permalink(); ?>">
                <div class="full-post-link"></div>
                 </a>
                    <div class="category-holder">
                      <div><?php the_title(); ?></div>
                      <?php the_content(); ?>
                    </div>
                  </a>
                 </li>
             <?php endforeach;
         wp_reset_postdata();?>
     </ul>
     </div>

 </div>

 <?php get_footer(); ?>
