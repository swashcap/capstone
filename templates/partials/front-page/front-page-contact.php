<?php
/**
 * Front page contact partial.
 *
 * @package capstone
 */

if (function_exists('get_field')) :
    $image = get_field('contact_image');
    $heading = get_field('contact_heading');
    $content = get_field('contact_content');
    $button_text = get_field('contact_button_text');
    $button_link = get_field('contact_button_link');
?>
        <section class="front-page__contact">
            <div class="container-fluid">
                <a href="<?php echo esc_url($button_link); ?>">
                    <?php if ($image) : ?>
                        <?php capstone_picture($image); ?>
                    <?php endif; ?>
                    <div class="front-page__section__content">

                        <div class="row">
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                                <h1><?php echo $heading; ?></h1>
                                <p class="lead"><?php echo $content; ?></p>
                                <?php if ($button_text) : ?>
                                    <span class="btn btn-primary"><?php echo $button_text; ?></span>
                                <?php endif; ?>
                            </div>
                        </div><!-- .row -->
                    </div><!-- .front-page__section__content -->
                </a>
            </div>
        </section><!-- .contact -->
<?php
    unset($image, $heading, $content, $button_text, $button_link);
endif; // function_exists('get_field')
?>
