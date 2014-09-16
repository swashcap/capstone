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
                    <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-1">
                        <header class="entry-header">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </header><!-- .entry-header -->
                        <div class="entry-content">
                            <?php get_template_part('templates/partials/intro-text'); ?>
                            <?php the_content(); ?>
                        </div><!-- .entry-content -->
                        <?php get_template_part('templates/partials/contact/contact', 'form'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-4">
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
