<?php
/**
 * The template for displaying all pages.
 *
 * @package capstone
 */

get_header(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <main class="site__content" role="main">
                    <?php
                        while (have_posts()) :
                            the_post();

                            get_template_part('templates/partials/content', 'page');

                            if (comments_open() || get_comments_number() != '0') :
                                comments_template();
                            endif;
                        endwhile; // have_posts()
                    ?>
                </main><!-- .site__content -->
            </div>
        </div><!-- .row -->
    </div><!-- .container-fluid -->

<?php get_footer(); ?>
