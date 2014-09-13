<?php
/**
 * Front page about partial.
 *
 * @package capstone
 */

if (function_exists('get_field')) :
    $image = get_field('about_image');
    $heading = get_field('about_heading');
    $content = get_field('about_content');
    $button_text = get_field('about_button_text');
?>
    <section class="front-page__about">
        <div class="container-fluid">
            <a href="/about/">
                <?php capstone_picture($image); ?>
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <h1><?php echo $heading; ?></h1>
                        <p class="lead"><?php echo $content; ?></p>
                        <?php if ($button_text) : ?>
                            <span class="btn btn-default"><?php echo $button_text; ?></span>
                        <?php endif; ?>
                    </div>
                </div><!-- .row -->
            </a>
        </div><!-- .container-fluid -->
    </section><!-- .front-page__about -->
<?php
    unset($image, $heading, $content, $button_text);
endif; // function_exists('get_field')
?>
