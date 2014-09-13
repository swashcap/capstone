<?php
/**
 * Testimonial partial.
 *
 * @package capstone
 */

$name = '';
$source = '';

if (function_exists('get_field')) {
    $name = get_field('name');
    $source = get_field('source');
}

?>
<article id="post-<?php the_ID(); ?>" class="hentry testimonial">
    <?php if (has_post_thumbnail()) : ?>
        <div class="testimonial__image vcard author">
            <?php
                the_post_thumbnail(
                    'full',
                    array(
                        'class' => 'attachment-full photo'
                    )
                );
            ?>
        </div>
    <?php endif; // has_post_thumbnail() ?>
    <div class="entry-content">
        <blockquote class="testimonial__quote">
            <?php the_content(); ?>
        </blockquote><!-- .testimonial__quote -->
    </div><!-- .entry-content -->
    <div class="testimonial__source vcard author">
        <?php if ($name) : ?>
            <span class="fn"><?php echo $name; ?></span>
        <?php else : ?>
            <span class="fn"><?php echo get_the_title(); ?></span>
        <?php endif; ?>
        <?php if ($source) : ?>
            <div class="note"><?php echo $source; ?></div>
        <?php endif; ?>
    </div><!-- .vcard.author -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php unset($name, $source); ?>