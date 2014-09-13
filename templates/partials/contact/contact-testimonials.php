<?php
/**
 * Contact testimonials partial.
 *
 * @package capstone
 */
if (function_exists('get_field')) :
    $testimonials = '';
    $testimonial_ids = get_field('testimonials');

    if (count($testimonial_ids) > 0) :
        $testimonials = new WP_Query(array(
            'orderby'        => 'post__in',
            'post__in'       => $testimonial_ids,
            'post_type'      => 'testimonial',
            'posts_per_page' => -1
        ));
?>
    <section class="contact__testimonials">
        <h1 class="hidden"><?php _e('Testimonials', 'capstone'); ?></h1>
        <?php
            while ($testimonials->have_posts()) :
                $testimonials->the_post();

                get_template_part('templates/partials/testimonial');
            endwhile; // $testimonials->have_posts
        ?>
    </section><!-- .contact__testimonials -->
<?php
        wp_reset_query();
    endif; // $testimonial_ids
    unset($testimonials, $testimonial_ids);
endif; // function_exists('get_field')
?>
