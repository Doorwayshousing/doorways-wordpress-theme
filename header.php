<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<meta name="description" content="Doorways is the only organization in the Saint Louis area whose sole mission is to provide affordable, secure housing and related services for people living with HIV/AIDS. This mission is based on research that demonstrates that stable housing is the primary requisite for the most effective and compassionate treatment, management and prevention of HIV/AIDS.">
<meta name="keywords" content="Housing, AIDS, HIV, awareness, donate, st. louis, saint louis, missouri">
<meta property='og:image' content='http://doorwayshousing.org/fbpreview.png'/>
<title>Doorways Housing - <?php wp_title(''); ?></title>
<link rel="icon" type="image/svg+xml" href="<insert svg file link here>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="https://www.sagepayments.net/pay/1.0.0/js/pay.min.js"></script>
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/css/custom.min.css">
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/js/custom.min.js"></script>

<? wp_head(); ?>
</head>

<body>
    <div id="top-nav">
      <ul>
        <li class="search-icon"></li>
        <li class="nav-icon"></li>
      </ul>
    </div>
    <div class="side-nav">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'main-navigation',
            'container_class' => 'nav-container' ) );
        ?>
        <div class="search-container">
            <form style="display:none;" role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                <input type="search" class="search-field"
                    placeholder="Search"
                    value="<?php echo get_search_query() ?>" name="s"
                    title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                <input type="submit" class="search-submit"
                    value="<?php echo esc_attr_x( 'Go', 'submit button' ) ?>" />
            </form>
        </div>
    </div>
    <div class="sub-header">
        <div class="logo-container">
            <div class="logo">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/doorwaysLogo.png" alt="" />
            </div>
        </div>
        <div class="info-container">
            <div class="contact">
                <ul>
                    <li class="address-icon">
                        <i class="fa fa-phone"></i>
                    </li>
                    <li>(314) 535-1919</li>
                </ul>
            </div>
            <div class="address">
                <ul>
                    <li class="address-icon">
                        <i class="fa fa-map-marker"></i>
                    </li>
                    <li>
                        <div>4385 Maryland Avenue</div>
                        <div>Saint Lous, MO 63108</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
