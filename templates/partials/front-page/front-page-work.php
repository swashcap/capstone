<?php
/**
 * Front page work partial.
 *
 * @package capstone
 */

if (function_exists('get_field')) :
    $heading = get_field('work_heading');
    $content = get_field('work_content');
    $work_item = get_field('work_item');
    $button_text = get_field('work_button_text');

    if ($work_item) :
        $work = new WP_Query(array(
            'p'         => $work_item[0],
            'post_type' => 'work'
        ));

        if ($work->have_posts()) :
?>
    <section class="front-page__work">
        <div class="container-fluid">
            <?php
                while ($work->have_posts()) :
                    $work->the_post();
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <?php capstone_picture(get_post_thumbnail_id()); ?>
                        <div class="front-page__section__content">
                            <div class="row">
                                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                                    <h1><?php echo $heading; ?></h1>
                                    <p class="lead"><?php echo $content; ?></p>
                                    <?php if ($button_text) : ?>
                                        <span class="btn btn-default"><?php echo $button_text; ?></span>
                                    <?php endif; ?>
                                </div>
                            </div><!-- .row -->
                        </div><!-- .front-page__section__content -->
                    </a>
                </article><!-- #post-<?php the_ID(); ?> -->
            <?php
                endwhile; // $work->have_posts()
            ?>
        </div><!-- .container-fluid -->
    </section><!-- .front-page__work -->
<?php
        endif; // $work->have_posts()
        wp_reset_query();
    endif; // $work_item
    unset($heading, $content, $work_item, $button_text);
endif; // function_exists('get_field')
?>
