<?php
/**
 * Front page blog partial.
 *
 * @package capstone
 */

if (function_exists('get_field')) :
    $heading = get_field('blog_heading');
    $latest = new WP_Query(array(
        'posts_per_page' => 1
    ));

    if ($latest->have_posts()) :
?>
    <section class="front-page__blog">
        <div class="container-fluid">
            <?php
                while ($latest->have_posts()) :
                    $latest->the_post();
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <?php capstone_picture(get_post_thumbnail_id()); ?>
                        <div class="front-page__section__content">
                            <div class="row">
                                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                                    <?php if ($heading) : ?>
                                        <h1><?php echo $heading; ?></h1>
                                    <?php endif; ?>
                                    <h1 class="entry-title"><?php the_title(); ?></h1>
                                    <span class="btn btn-default"><?php _e('Read Post', 'capstone'); ?></span>
                                </div>
                            </div><!-- .row -->
                        </div><!-- .front-page__section__content -->
                    </a>
                </article><!-- #post-<?php the_ID(); ?> -->
            <?php
                endwhile; // $latest->have_posts()
            ?>
        </div><!-- .container-fluid -->
    </section><!-- .front-page__blog -->
<?php
    endif; // $latest->have_posts()
    wp_reset_query();
    unset($heading, $latest);
endif; // function_exists('get_field')
?>
