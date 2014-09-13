<?php
/**
 * The template for displaying all single posts.
 *
 * @package capstone
 */

get_header(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <main class="site__content" role="main">
                    <?php
                        while (have_posts()) :
                            the_post();

                            get_template_part('templates/partials/content', 'single');

                            capstone_post_nav();

                        endwhile; // have_posts()
                    ?>
                </main><!-- .site__content -->
            </div>
        </div><!-- .row -->
    </div><!-- .container-fluid -->

<?php get_footer(); ?>
