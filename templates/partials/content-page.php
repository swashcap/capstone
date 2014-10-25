<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package capstone
 */
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
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_content(); ?>
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'capstone' ),
                        'after'  => '</div>',
                    ) );
                ?>
            </div><!-- .entry-content -->
        </div>
    </div><!-- .row -->
    <footer class="entry-footer row">
        <div class="hidden">
            <?php capstone_posted_on(); ?>
            <?php capstone_entry_author(); ?>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-1">
            <?php edit_post_link( __( 'Edit', 'capstone' ), '<span class="edit-link">', '</span>' ); ?>
        </div>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
