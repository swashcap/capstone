<?php
/**
 * Work single partial.
 *
 * @package capstone
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('article work--single'); ?>>
    <header class="entry-header">
        <h1 class="entry-title work__title"><?php the_title(); ?></h1>
        <?php
            if (function_exists('get_field')) :
                $location = get_field('location');
                $date = get_field('event_date');

                if ($location) {
                    echo '<h2 class="work__location">' . $location . '</h2>';
                }
                if ($date) {
                    printf(
                        '<h3 class="work__date">%s</h3>',
                        date(get_option('date_format'), strtotime($date))
                    );
                }

                unset($location, $date);
            endif;
        ?>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'capstone' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- .entry-content -->
    <aside class="call-to-action">
        <h1>Test</h1>
        <p class="lead">Test</p>
        <a href="#" class="btn btn-primary">Contact</a>
    </aside><!-- .call-to-action -->
    <footer class="entry-footer">
        <?php capstone_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
