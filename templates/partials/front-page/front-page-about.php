<?php
/**
 * Front page about partial.
 *
 * @package capstone
 */

if (function_exists('get_field')) :
    $link = get_field('about_link');
    $image = get_field('about_image');
    $heading = get_field('about_heading');
    $content = get_field('about_content');
    $button_text = get_field('about_button_text');
?>
    <section class="front-page__about">
        <div class="container-fluid">
            <?php if ($link) : ?>
                <a href="<?php echo esc_url($link); ?>" rel="bookmark">
            <?php endif; ?>
            <?php capstone_picture($image); ?>
            <div class="front-page__section__content">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <h1><?php echo $heading; ?></h1>
                        <p class="lead"><?php echo $content; ?></p>
                        <?php if ($link && $button_text) : ?>
                            <span class="btn btn-primary"><?php echo $button_text; ?></span>
                        <?php endif; ?>
                    </div>
                </div><!-- .row -->
            </div><!-- .front-page__section__content -->
            <?php if ($link) : ?>
                </a>
            <?php endif; ?>
        </div><!-- .container-fluid -->
    </section><!-- .front-page__about -->
<?php
    unset($link, $image, $heading, $content, $button_text);
endif; // function_exists('get_field')
?>
