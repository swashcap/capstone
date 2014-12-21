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
                $show_location_date = get_field('show_location_and_date');
                $location = get_field('location');

                if ($show_location_date && $location) {
                    echo '<h2 class="work__location">' . $location . '</h2>';
                }

                unset($location);
            endif;
        ?>
    </a>
    <footer class="entry-footer hidden">
        <?php capstone_posted_on(); ?>
        <?php capstone_entry_author(); ?>
    </footer>
</article><!-- #post-<?php the_ID(); ?> -->
