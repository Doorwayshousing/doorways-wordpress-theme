<?php
function doorways_setup() {
    register_nav_menus(
      array(
        'main-navigation' => __( 'Main Navigation' ),
        'extra-menu' => __( 'Extra Menu' )
      )
    );
    add_theme_support( 'html5', array( 'search-form' ) );
    add_theme_support( 'post-thumbnails' );
}

add_action( 'init', 'doorways_setup');
