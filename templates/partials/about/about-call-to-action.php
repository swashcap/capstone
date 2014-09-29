<?php
/**
 * About Call-to-Action partial.
 *
 * @package capstone
 */
if (function_exists('get_field')) :
    $heading = get_field('call_to_action_heading');
    $text = get_field('call_to_action_text');
    $button_text = get_field('call_to_action_button_text');
    $button_link = get_field('call_to_action_button_link');
?>
    <section class="about__call-to-action call-to-action">
        <h1><?php echo $heading; ?></h1>
        <p class="lead"><?php echo $text; ?></p>
        <?php
            if ($button_text && $button_link) {
                printf(
                    '<a href="%1$s" class="btn btn-primary">%2$s</a>',
                    esc_url($button_link),
                    $button_text
                );
            }
        ?>
    </section><!-- .about__call-to-action.call-to-action -->
<?php endif; // function_exists('get_field') ?>
