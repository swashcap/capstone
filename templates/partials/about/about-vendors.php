<?php
/**
 * @package capstone
 */

if (function_exists('get_field')) :
    $vendor_title = get_field('vendor_title');
    $vendors = get_field('vendor_list');

    if (count($vendors)) :
?>
    <section class="about__vendors">
        <?php if ($vendor_title) : ?>
            <h1><?php echo $vendor_title; ?></h1>
        <?php endif; // $vendor_title ?>
        <ul>
            <?php
                foreach ($vendors as $vendor) {
                    if (! empty($vendor['link'])) {
                        printf(
                            '<li><a href="%1$s" rel="bookmark">%2$s</a></li>',
                            esc_attr($vendor['link']),
                            $vendor['name']
                        );
                    } else {
                        printf(
                            '<li>%s</li>',
                            $vendor['name']
                        );
                    }
                }
            ?>
        </ul>
    </section><!-- .about__vendors -->
<?php
    endif; // count($vendors)
endif; // function_exists('get_field')
?>
