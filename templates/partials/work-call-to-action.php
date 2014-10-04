<?php
/**
 * Work Call-to-Action partial.
 *
 * @package capstone
 */

if (function_exists('get_field')) :
    $heading = get_field('call_to_action_heading');
    $content = get_field('call_to_action_content');
    $button_link = get_field('call_to_action_button_link');
    $button_text = get_field('call_to_action_button_text');
?>
    <aside class="call-to-action">
        <?php if ($heading) : ?>
            <h1><?php echo $heading; ?></h1>
        <?php endif; ?>
        <?php if ($content) : ?>
            <p class="lead"><?php echo $content; ?></p>
        <?php endif; ?>
        <?php if ($button_link && $button_text) : ?>
            <a href="<?php echo esc_url($button_link); ?>" class="btn btn-primary"><?php echo $button_text; ?></a>
        <?php endif; ?>
    </aside><!-- .call-to-action -->
<?php
    unset($heading, $content, $button_link, $button_text);
endif; // function_exists('get_field')
?>
