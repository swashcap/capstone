<?php
/**
 * Contact rates partial.
 *
 * @package capstone
 */
if (function_exists('get_field')):
    $heading = get_field('rates_heading');
    $content = get_field('rates_content');
?>
    <section class="contact__rates">
        <?php if ($heading) : ?>
            <h1><?php echo $heading; ?></h1>
        <?php endif; ?>
        <?php echo $content; ?>
    </section><!-- .contact__rates -->
<?php
    unset($heading, $content);
endif; // function_exists('get_field')
?>
