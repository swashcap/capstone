<?php
/**
 * About testimonial partial.
 *
 * @package capstone
 */

if (function_exists('get_field')) :
    $testimonial = '';
    $testimonial_id = get_field('testimonial');

    if ($testimonial_id) :

        $testimonial = new WP_Query(array(
            'post_type' => 'testimonial',
            'p'         => $testimonial_id[0]
        ));
?>
    <div class="about__testimonial">
        <?php
            while ($testimonial->have_posts()) :
                $testimonial->the_post();

                get_template_part('templates/partials/testimonial');
            endwhile; // $testimonial->have_posts()
        ?>
    </div><!-- .about__testimonial -->
<?php
        wp_reset_query();
    endif; // $testimonial_id
    unset($testimonial, $testimonial_id);
endif; // function_exists('get_field')
?>
