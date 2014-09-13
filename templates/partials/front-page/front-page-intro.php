<?php
/**
 * Front page intro partial.
 *
 * @package capstone
 */

if (function_exists('get_field')) :
    $heading = get_field('intro_heading');
    $content = get_field('intro_content');
?>
    <section class="front-page__intro">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                    <h1><?php echo $heading; ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                    <p class="lead"><?php echo $content; ?></p>
                </div>
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </section><!-- .front-page__intro -->
<?php
    unset($heading, $content);
endif; // function_exists('get_field')
?>
