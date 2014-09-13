<?php
/**
 * Intro text partial.
 *
 * @package capstone
 */
if (function_exists('get_field')) :
    $intro_text = get_field('intro_text');

    if (! empty($intro_text)) :
?>
    <p class="lead"><?php echo $intro_text; ?></p>
<?php
    endif;
    unset($intro_text);
endif; // function_exists('get_field')
?>
