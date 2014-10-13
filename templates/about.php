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
            <article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-sm-offset-0 col-sm-push-8">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="entry-thumbnail">
                                <?php the_post_thumbnail('full'); ?>
                            </div><!-- .entry-thumbnail -->
                        <?php endif; ?>
                        <div class="hidden-xs">
                            <?php get_template_part('templates/partials/about/about', 'testimonial'); ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-pull-4 col-md-pull-3">
                        <div class="hidden">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </div><!-- .hidden -->
                        <div class="entry-content">
                            <?php get_template_part('templates/partials/intro-text'); ?>
                            <?php the_content(); ?>
                        </div>
                        <div class="visible-xs">
                            <?php get_template_part('templates/partials/about/about', 'testimonial'); ?>
                        </div>
                        <?php get_template_part('templates/partials/about/about', 'call-to-action'); ?>
                    </div><!-- .col-xs-12 -->
                </div><!-- .row -->
            </article><!-- #post-<?php the_ID(); ?>
        <?php
            endwhile; // have_posts()
        ?>
    </main><!-- .site__content.container-fluid -->

<?php get_footer(); ?>
