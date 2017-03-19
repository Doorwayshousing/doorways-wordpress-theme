<?php
/*
Template Name: Doorways Home Page
*/
 get_header(); ?>
 <div id="homepage-bg">
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
     <div class="lm-donate-cont">
         <ul class="lm-donate-body">
                 <?php
            $args = array( 'posts_per_page' => 2, 'category_name' => 'LearnMore,Donate' );
            $myposts = get_posts( $args );
            foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                 <li class="<?php $category = get_the_category(); $firstCategory = $category[0]->cat_name; echo $firstCategory; ?>" style="background: url(<?php the_post_thumbnail_url('medium');?>)no-repeat center center; background-size:cover;">
                     <a href="<?php the_permalink(); ?>">
                             <div class="title-text"><?php the_title(); ?></div>
                             <div class="content-text"><?php the_content(); ?></div>
                     </a>
                 </li>
             <?php endforeach;
         wp_reset_postdata();?>
       </ul>
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
             <ul class="ne-holder">
                     <?php
                $args = array( 'posts_per_page' => 3, 'category_name' => 'News,Events' );
                $myposts = get_posts( $args );
                foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                     <li class="<?php $category = get_the_category(); $firstCategory = $category[0]->cat_name; echo $firstCategory; ?>">
                         <div class="badge">
                             <div class="badge-icon"></div>
                         </div>
                         <div class="radial" style="background: url(<?php the_post_thumbnail_url('medium');?>)no-repeat center center; background-size:cover;">
                             <a href="<?php the_permalink(); ?>">
                                 <div class="title-container">
                                     <div class="title-background"></div>
                                     <div class="title-text"><?php the_title(); ?></div>
                                </div>
                             </a>
                         </div>
                     </li>
                 <?php endforeach;
             wp_reset_postdata();?>
         </ul>
         </div>
     </div>
     <div class="testimonials-cont">
         <ul class="testimonials-body">
           <div class="cover"></div>
                 <?php
            $args = array( 'posts_per_page' => 3, 'category_name' => 'Testimonials' );
            $myposts = get_posts( $args );
            foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            <a href="<?php the_permalink(); ?>">
                 <li class="<?php $category = get_the_category(); $firstCategory = $category[0]->cat_name; echo $firstCategory; ?>">
                    <div class="testimonial-icon"></div>
                     <div class="content-text"><?php the_content(); ?></div>
                     <div class="signature-text"><?php the_title(); ?></div>
                 </li>
            </a>
             <?php endforeach;
         wp_reset_postdata();?>
       </ul>
     </div>
</div>

 <?php get_footer(); ?>
