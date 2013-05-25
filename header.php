<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/apple-touch-icon-iphone.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/apple-touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/apple-touch-icon-iphone4.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/apple-touch-icon-ipad3.png" />

    <?php wp_head(); ?>
 
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'crc-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'crc-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed container">
    <div id="header" class="row">
        <div id="masthead">
            <div id="access">
				<?php #wp_page_menu( 'sort_column=menu_order' ); ?>
				<?php // testing block below... wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-header' ) ); ?>

				<?php 
                    wp_nav_menu( array(
                        'menu'       => 'top_menu',
                        'depth'      => 2,
                        'container'  => false,
                        'menu_class' => 'nav nav-pills',
                        'fallback_cb' => 'wp_page_menu',
                        //Process nav menu using our custom nav walker
                        'walker' => new twitter_bootstrap_nav_walker())
                    );
                ?>

                
            </div><!-- #access -->
        </div><!-- #masthead -->
    </div><!-- #header -->
    <div id="main">