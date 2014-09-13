<?php
/**
 * Template Name: About
 *
 * @package capstone
 */

get_header(); ?>

    <main class="site__content container-fluid" role="main">
        <?php
            while (have_posts()) :
                the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0 col-sm-push-8 col-md-push-7">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-pull-4 col-md-pull-3">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <div class="entry-content">
                            <?php get_template_part('templates/partials/intro-text'); ?>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div><!-- .row -->
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-sm-push-8 col-md-3 col-md-push-7">
                        <?php get_template_part('templates/partials/about', 'vendors'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-pull-4 col-md-6 col-md-pull-2">
                        <?php get_template_part('templates/partials/about', 'testimonial'); ?>
                        <?php get_template_part('templates/partials/about', 'call-to-action'); ?>
                    </div>
                </div>
            </article><!-- #post-<?php the_ID(); ?>
        <?php
            endwhile; // have_posts()
        ?>
    </main><!-- .site__content.container-fluid -->

<?php get_footer(); ?>
