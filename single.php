<?php
/**
 * The template for displaying all single posts.
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

                            get_template_part('templates/partials/content', 'single');

                            capstone_post_nav();

                        endwhile; // have_posts()
                    ?>
                </main><!-- .site__content -->
            </div>
        </div><!-- .row -->
    </div><!-- .container-fluid -->

<?php get_footer(); ?>
