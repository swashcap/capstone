<?php
/**
 * The header for our theme.
 *
 * @package capstone
 */
?><!doctype html class="no-js">
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title('|', true, 'right'); ?></title>

        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="hfeed site">
            <a class="sr-only" href="#content"><?php _e('Skip to content', 'capstone'); ?></a>

            <header class="site__header" role="banner">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a href="#navigation" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                <span class="sr-only"><?php _e('Toggle navigation', 'capstone'); ?></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                        </div>
                        <?php
                            wp_nav_menu( array(
                                'menu'            => 'primary',
                                'theme_location'  => 'primary',
                                'depth'           => 2,
                                'container'       => 'div',
                                'container_class' => 'collapse navbar-collapse',
                                'container_id'    => 'navbar-collapse-1',
                                'menu_class'      => 'nav navbar-nav',
                                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                'walker'          => new wp_bootstrap_navwalker()
                            ));
                        ?>
                    </div><!-- .container-fluid -->
                </nav><!-- .navbar.navbar-default -->
            </header><!-- .site__header -->

            <div id="content" class="site-content">
