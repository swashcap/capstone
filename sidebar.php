<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package capstone
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>

<div id="secondary" class="site__sidebar widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
