<?php
function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'main-navigation' => __( 'Main Navigation' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );
