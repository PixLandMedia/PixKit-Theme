<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package PixKit
 * @since PixKit 0.1.0
 */
?><!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>
        <?php
            /*
            * Print the <title> tag based on what is being viewed.
            */
            global $page, $paged;
             
            wp_title( '|', true, 'right' );
             
            // Add the blog name.
            bloginfo( 'name' );
             
            // Add the blog description for the home/front page.
            $site_description = get_bloginfo( 'description', 'display' );
            
            if ( $site_description && ( is_home() || is_front_page() ) )
                echo " | $site_description";
             
            // Add a page number if necessary:
            if ( $paged >= 2 || $page >= 2 )
                echo ' | ' . sprintf( __( 'Page %s', 'pixkit' ), max( $paged, $page ) );
             
        ?>
    </title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <?php wp_head(); ?>

</head>
 
<body <?php body_class(); ?>>

    <!-- Mobile header -->
    <nav class="navbar navbar-fixed-top sb-slide hide visible-xs nav-xs" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <i class="fa fa-bars fa-2x sb-left-button"></i>
                </div>
                <div class="col-xs-8 text-center">
                    <h1><a href="/"><?php bloginfo( 'name' ); ?></a></h1>
                </div>
                <div class="col-xs-2 text-right">
                    <i class="fa fa-search fa-2x sb-right-button"></i>
                </div>
            </div><!-- / .row -->
        </div><!-- / .container -->
    </nav><!-- / Mobile menu -->
    <!-- / Mobile header -->


    <!-- Left Slidebar -->
    <div class="sb-slidebar sb-left">
        <nav>
            <?php 
                wp_nav_menu( array( 
                    'theme_location' => 'primary',
                    'menu_class'     => 'sb-menu sb-navbar-menu'
                ) ); 
            ?>
            <?php /*
            <ul class="sb-menu sb-navbar-menu">
                <li class="active"><a href="../html/index.html">HOME</a></li>
                <li><a href="../html/about-us.html">ABOUT US</a></li>
                <li>
                    <a href="#" data-submenu="#submenu-one" class="sb-toggle-submenu">
                        SUBMENU
                        <i class="fa fa-angle-down pull-right"></i>
                    </a>
                    <ul id="submenu-one" class="sb-submenu">
                        <li><a href="#">Sub Item 1</a></li>
                        <li><a href="#">Sub Item 2</a></li>
                        <li><a href="#">Sub Item 3</a></li>
                        <li>
                            <a href="#" data-submenu="#submenu-two" class="sb-toggle-submenu">
                                Sub Item 4
                                <i class="fa fa-angle-down pull-right"></i>
                            </a>
                            <ul id="submenu-two" class="sb-submenu">
                                <li><a href="#">Sub Item 1</a></li>
                                <li><a href="#">Sub Item 2</a></li>
                                <li><a href="#">Sub Item 3</a></li>
                                <li><a href="#">Sub Item 4</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>
            </ul><!-- / .sb-menu -->
            */ ?>
        </nav>
    </div><!-- / .sb-left -->
    <!-- / Left Slidebar -->

    <!-- / Right Slidebar -->
    <div class="sb-slidebar sb-right">
        <!-- Your right Slidebar content. -->
    </div><!-- / .sb-right -->
    <!-- / Right Slidebar -->

    <!-- HEADER -->
    <header id="site-header">
        <nav class="navbar navbar-fixed-top hidden-xs site-navigation main-navigation" role="navigation">

            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <hgroup>
                            <h1 class="site-title">
                                <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                    <?php bloginfo( 'name' ); ?>
                                </a>
                            </h1>
                            <h2 class="site-description">
                                <?php bloginfo( 'description' ); ?>
                            </h2>
                        </hgroup>
                    </div>
                    <div class="col-sm-9">
                        <?php /*
                        <h1 class="assistive-text">
                            <?php _e( 'Menu', 'pixkit' ); ?>
                        </h1>
                        <div class="assistive-text skip-link">
                            <a href="#content" title="<?php esc_attr_e( 'Skip to content', '_s' ); ?>">
                                <?php _e( 'Skip to content', 'pixkit' ); ?>
                            </a>
                        </div> //
                        */ ?>        
                        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

                    </div>
                </div>
            </div>
        </nav><!-- nav -->
    </header> <!-- header -->

    <div id="sb-site">
