<?php
/**
 * @package capstone
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if (has_post_thumbnail()) : ?>
            <div class="entry-thumbnail">
                <?php capstone_picture(get_post_thumbnail_id()); ?>
            </div><!-- .entry-thumbnail -->
        <?php endif; ?>
        <div class="entry-meta">
            <?php capstone_posted_on(); ?>
        </div><!-- .entry-meta -->
        <h1 class="entry-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h1>
    </header><!-- .entry-header -->

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

    <a href="<?php the_permalink(); ?>" class="btn btn-default" rel="bookmark"><?php _e('Read Post', 'capstone'); ?></a>

    <footer class="entry-footer hidden">
        <?php capstone_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
