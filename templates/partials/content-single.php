<?php
/**
 * @package capstone
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
    <header class="entry-header">
        <div class="entry-meta">
            <?php capstone_posted_on(); ?>
        </div><!-- .entry-meta -->
        <h1 class="entry-title"><?php the_title(); ?></h1>
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

    <footer class="entry-footer">
        <?php capstone_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
