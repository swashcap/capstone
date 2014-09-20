<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package capstone
 */

if ( ! function_exists( 'capstone_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function capstone_paging_nav() {
    global $wp_query;

    // Don't print empty markup if there's only one page.
    if ($wp_query->max_num_pages < 2) {
        return;
    }

    $format = '/page/%#%';
    $prev_text = __('&larr; Previous', 'capstone');
    $next_text = __('Next &rarr;', 'capstone');
    $output = '<li class="%1$s">%2$s</li>';

    if (empty(get_option('permalink_structure'))) {
        $format = '?page=%#%';
    }

    $links = paginate_links(array(
        'base' => str_replace(999999, '%#%', esc_url(get_pagenum_link(999999))),
        'format'    => $format,
        'total'     => $wp_query->max_num_pages,
        'prev_text' => $prev_text,
        'next_text' => $next_text,
        'type'      => 'array',
    ));

    ?>
    <nav class="navigation paging-navigation" role="navigation">
        <h1 class="sr-only"><?php _e( 'Posts navigation', 'capstone' ); ?></h1>
        <ul class="pagination">
            <?php
                for ($i = 0; $i < count($links); $i++) {
                    if ($i === 0 && strpos($links[$i], 'prev') === false) {
                        printf(
                            $output,
                            'disabled',
                            '<a>' . $prev_text . '</a>'
                        );
                    } else if ($i === count($links) - 1 && strpos($links[$i], 'next') === false) {
                        printf(
                            $output,
                            'disabled',
                            '<a>' . $next_text . '</a>'
                        );
                    } else if (strpos($links[$i], 'current') !== false) {
                        printf(
                            $output,
                            'active',
                            $links[$i]
                        );
                    } else {
                        printf(
                            $output,
                            '',
                            $links[$i]
                        );
                    }
                }
            ?>
        </ul><!-- .pagination -->
    </nav><!-- .navigation -->
    <?php
}
endif;

if ( ! function_exists( 'capstone_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function capstone_post_nav() {
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous ) {
        return;
    }

    $previous_post = get_previous_post();
    $next_post = get_next_post();

    ?>
    <nav class="navigation post-navigation row" role="navigation">
        <h1 class="sr-only"><?php _e( 'Post navigation', 'capstone' ); ?></h1>
        <div class="nav-previous col-xs-6">
            <?php
                if ($previous_post) {
                    $previous_thumbnail = get_the_post_thumbnail($previous_post->ID);
                    previous_post_link('%link', "$previous_thumbnail <span><span class=\"meta-nav\">&larr;</span> %title</span>");
                }
            ?>
        </div>
        <div class="nav-next col-xs-6">
            <?php
                if ($next_post) {
                    $next_thumbnail = get_the_post_thumbnail($next_post->ID);
                    next_post_link('%link', "$next_thumbnail <span>%title <span class=\"meta-nav\">&rarr;</span></span>");
                }
            ?>
        </div>
    </nav><!-- .navigation -->
    <?php
}
endif;

if ( ! function_exists( 'capstone_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 */
function capstone_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated hidden" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( 'c' ) ),
        esc_html( get_the_modified_date() )
    );

    echo '<span class="posted-on">' . $time_string . '</span>';

}
endif;

/**
 * Prints HTML with meta information for the current post's author.
 *
 * @return void
 */
function capstone_entry_author() {
    $byline = sprintf(
        _x( 'by %s', 'post author', 'capstone' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );

    echo '<span class="byline"> ' . $byline . '</span>';
}

if ( ! function_exists( 'capstone_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function capstone_entry_footer() {
    // Hide category and tag text for pages.
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( __( ', ', 'capstone' ) );
        if ( $categories_list && capstone_categorized_blog() ) {
            printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'capstone' ) . '</span>', $categories_list );
        }

        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', __( ', ', 'capstone' ) );
        if ( $tags_list ) {
            printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'capstone' ) . '</span>', $tags_list );
        }
    }

    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo '<span class="comments-link">';
        comments_popup_link( __( 'Leave a comment', 'capstone' ), __( '1 Comment', 'capstone' ), __( '% Comments', 'capstone' ) );
        echo '</span>';
    }

    edit_post_link( __( 'Edit', 'capstone' ), '<span class="edit-link">', '</span>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function capstone_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'capstone_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,

            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'capstone_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so capstone_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so capstone_categorized_blog should return false.
        return false;
    }
}

/**
 * Flush out the transients used in capstone_categorized_blog.
 */
function capstone_category_transient_flusher() {
    // Like, beat it. Dig?
    delete_transient( 'capstone_categories' );
}
add_action( 'edit_category', 'capstone_category_transient_flusher' );
add_action( 'save_post',     'capstone_category_transient_flusher' );

/**
 * Output `picture` element.
 *
 * @param  int  $image_id WordPress attachment ID
 * @return void
 */
function capstone_picture($image_id) {
    $full = wp_get_attachment_image_src($image_id, 'full');
    $large = wp_get_attachment_image_src($image_id, 'large');
    $medium = wp_get_attachment_image_src($image_id, 'medium');
    $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);

    if ($full && $large && $medium) {
        printf(
            '<picture>
                <!--[if IE 9]><video style="display: none;"><![endif]-->
                <source srcset="%1$s" media="(min-width: 1024px)">
                <source srcset="%2$s, %1$s 2x" media="(min-width: 300px)">
                <source srcset="%3$s, %2$s 2x">
                <!--[if IE 9]></video><![endif]-->
                <img srcset="%3$s, %2$s 2x" alt="%4$s">
            </picture>',
            $full[0],
            $large[0],
            $medium[0],
            esc_attr($alt_text)
        );
    } elseif ($large) {
        printf(
            '<img src="%1$s" alt="%2$s">',
            $large[0],
            esc_attr($alt_text)
        );
    }
}

/**
 * Output `picture` element specifically for 'micro' work elements.
 *
 * @param  int  $image_id WordPress attachment ID
 * @return void
 */
function capstone_work_picture($image_id) {
    $small = wp_get_attachment_image_src($image_id, 'capstone_work_small');
    $medium = wp_get_attachment_image_src($image_id, 'capstone_work_medium');
    $large = wp_get_attachment_image_src($image_id, 'capstone_work_large');
    $xlarge = wp_get_attachment_image_src($image_id, 'capstone_work_xlarge');
    $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);

    printf(
        '<picture>
            <!--[if IE 9]><video style="display: none;"><![endif]-->
            <source srcset="%2$s, %1$s 2x" media="(min-width: 901px)">
            <source srcset="%3$s, %2$s 2x" media="(min-width: 321px)">
            <source srcset="%4$s, %3$s 2x">
            <!--[if IE 9]></video><![endif]-->
            <img srcset="%4$s, %3$s 2x" alt="%5$s">
        </picture>',
        $xlarge[0],
        $large[0],
        $medium[0],
        $small[0],
        esc_attr($alt_text)
    );
}
