<?php
/**
 * Intro text partial.
 *
 * @package capstone
 */
if (function_exists('get_field')) :
    $intro_heading = get_field('intro_heading');
    $intro_text = get_field('intro_text');


    if ($intro_heading || $intro_text) :
?>
    <div class="entry-intro">
        <?php if ($intro_heading) : ?>
            <h1><?php echo $intro_heading; ?></h1>
        <?php endif; ?>
        <?php if ($intro_text) : ?>
            <p class="lead"><?php echo $intro_text; ?></p>
        <?php endif; ?>
    </div><!-- .entry-intro -->
<?php
    endif; // $intro_heading || $intro_text
    unset($intro_heading, $intro_text);
endif; // function_exists('get_field')
?>
