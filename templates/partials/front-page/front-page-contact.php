<?php
/**
 * Front page contact partial.
 *
 * @package capstone
 */

if (function_exists('get_field')) :
    $image = get_field('contact_image');
    $testimonial_id = get_field('contact_testimonial');
    $heading = get_field('contact_heading');
    $content = get_field('contact_content');
    $button_text = get_field('contact_button_text');

    if ($testimonial_id) :
        $testimonial = new WP_Query(array(
            'p'         => $testimonial_id[0],
            'post_type' => 'testimonial'
        ));
?>
        <section class="front-page__contact">
            <div class="container-fluid">
                <a href="/booking/">
                    <?php if ($image) : ?>
                        <?php capstone_picture($image); ?>
                    <?php endif; ?>
                    <div class="front-page__section__content">
                        <?php
                            if ($testimonial->have_posts()) :
                                while ($testimonial->have_posts()) :
                                    $testimonial->the_post();
                        ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                    <?php get_template_part('templates/partials/testimonial'); ?>
                                </div>
                            </div><!-- .row -->
                        <?php
                                endwhile; // $testimonial->have_posts()
                            endif; // $testimonial->have_posts()
                        ?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                                <h1><?php echo $heading; ?></h1>
                                <p class="lead"><?php echo $content; ?></p>
                                <?php if ($button_text) : ?>
                                    <span class="btn btn-default"><?php echo $button_text; ?></span>
                                <?php endif; ?>
                            </div>
                        </div><!-- .row -->
                    </div><!-- .front-page__section__content -->
                </a>
            </div>
        </section><!-- .contact -->
<?php
        wp_reset_query();
        unset($image, $testimonial_id, $heading, $content, $button_text, $testimonial);
    endif; // $testimonial_id
endif; // function_exists('get_field')
?>
