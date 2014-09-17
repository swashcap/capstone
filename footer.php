<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package capstone
 */
?>

            </div><!-- #content -->

            <footer class="site__footer" role="contentinfo">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-md-push-9">
                            <a href="#content" class="sr-only"><?php _e('Back to content', 'capstone'); ?></a>
                            <nav id="navigation" role="navigation">
                                <h2 class="sr-only"><?php _e('Navigation Menu', 'capstone'); ?></h2>
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                                <?php
                                    wp_nav_menu(array(
                                        'menu'           => 'primary',
                                        'theme_location' => 'primary',
                                        'depth'          => 1,
                                        'container'      => false,
                                        'menu_class'     => 'nav nav-pills nav-stacked'
                                    ));
                                ?>
                            </nav><!-- #navigation -->
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-md-pull-3">
                            <?php dynamic_sidebar('footer-sidebar-1'); ?>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-md-pull-3">
                            <?php dynamic_sidebar('footer-sidebar-2'); ?>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-md-pull-3">
                            <?php dynamic_sidebar('footer-sidebar-3'); ?>
                        </div>
                    </div><!-- .row -->
                    <small class="copyright">
                        <?php
                            _e(sprintf('&copy;%d, %s. All rights reserved.', date('Y'), get_bloginfo('name')), 'capstone');
                        ?>
                    </small>
                </div><!-- .container -->
            </footer><!-- .site__footer -->
        </div><!-- .hfeed.site -->

        <?php wp_footer(); ?>

    </body>
</html>
