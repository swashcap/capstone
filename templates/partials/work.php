<?php
/**
 * Work partial.
 *
 * @package capstone
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('work--micro'); ?>>
    <a href="<?php the_permalink(); ?>" rel="bookmark">
        <?php if (has_post_thumbnail()) : ?>
            <div class="entry-thumbnail">
                <?php capstone_work_picture(get_post_thumbnail_id()); ?>
            </div>
        <?php endif; ?>
        <h1 class="work__title entry-title"><?php the_title(); ?></h1>
        <?php
            if (function_exists('get_field')) :
                $location = get_field('location');
                $date = get_field('event_date');

                if ($location) {
                    echo '<h2 class="work__location">' . $location . '</h2>';
                }
            endif;
        ?>
    </a>
    <footer class="entry-footer hidden">
    </footer>
</article><!-- #post-<?php the_ID(); ?> -->
