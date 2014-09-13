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
                <div class="container">
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
