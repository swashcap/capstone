<?php
/**
 * The template for displaying all pages.
 *
 * @package capstone
 */

get_header(); ?>

    <main class="site__content container-fluid" role="main">
        <?php
            while (have_posts()) :
                the_post();

                get_template_part('templates/partials/content', 'page');

                if (comments_open() || get_comments_number() != '0') :
        ?>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-md-push-1">
                    <?php comments_template(); ?>
                </div>
            </div><!-- .row -->
        <?php
                endif; // comments_open() || get_comments_number() != '0'
            endwhile; // have_posts()
        ?>
    </main><!-- .site__content.container-fluid -->

<?php get_footer(); ?>
