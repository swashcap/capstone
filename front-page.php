<?php
/**
 * Front page template.
 *
 * @package capstone
 */

get_header(); ?>

    <main class="site__content" role="main">
        <?php
            while (have_posts()) :
                the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="entry-title hidden"><?php the_title(); ?></h1>
                <div class="entry-content">

                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->
        <?php
            endwhile; // have_posts()
        ?>
    </main><!-- .site__content -->

<?php get_footer(); ?>
