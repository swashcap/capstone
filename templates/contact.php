<?php
/**
 * Template Name: Contact
 */

get_header(); ?>

    <main class="site__content container-fluid" role="main">
        <?php
            while (have_posts()) :
                the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-6 col-md-offset-1">
                        <div class="hidden">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </div><!-- .hidden -->
                        <div class="entry-content">
                            <?php get_template_part('templates/partials/intro-text'); ?>
                            <?php the_content(); ?>
                        </div><!-- .entry-content -->
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-4">
                        <?php get_template_part('templates/partials/contact/contact', 'rates'); ?>
                        <?php get_template_part('templates/partials/contact/contact', 'testimonials'); ?>
                    </div>
                </div>
            </article><!-- #post-<?php the_ID(); ?> -->
        <?php
            endwhile; // have_posts()
        ?>
    </main><!-- .site__content -->

<?php get_footer(); ?>
