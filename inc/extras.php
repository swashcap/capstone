<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package capstone
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function capstone_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'capstone_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function capstone_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    return $classes;
}
add_filter( 'body_class', 'capstone_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function capstone_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
    }

    global $page, $paged;

    // Add the blog name
    $title .= get_bloginfo( 'name', 'display' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " $sep $site_description";
    }

    // Add a page number if necessary:
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( __( 'Page %s', 'capstone' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter( 'wp_title', 'capstone_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function capstone_setup_author() {
    global $wp_query;

    if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
        $GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
    }
}
add_action( 'wp', 'capstone_setup_author' );

/**
 * Alter WordPress's default excerpt trailing content.
 *
 * @param  string $more Default 'more' text
 * @return string       Transformed 'more' text
 */
function capstone_excerpt_more($more) {
    return '&hellip;';
}
add_filter('excerpt_more', 'capstone_excerpt_more');

/**
 * Alter WordPress's default excerpt length.
 *
 * @param  int $length Default excerpt length
 * @return int         Transformed length
 */
function capstone_excerpt_length($length) {
    return 36;
}
add_filter('excerpt_length', 'capstone_excerpt_length');

/**
 * [capstone_list_comments description]
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_list_comments
 *
 * @return [type] [description]
 */
function capstone_list_comments($comment, $args, $depth) {
    extract($args, EXTR_SKIP);

    if ($args['style'] == 'div') {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }

    $classes = 'media ';
    $classes .= empty( $args['has_children'] ) ? '' : 'parent ';

    ?>
        <<?php echo $tag ?> id="comment-<?php comment_ID() ?>" <?php comment_class($classes) ?>>

    <?php
}

/**
 * Rewrites for the `work` custom post type and its taxonomy.
 *
 * @link http://wordpress.stackexchange.com/a/39862
 * @link http://wordpress.stackexchange.com/a/5313
 *
 * @package capstone
 */
function capstone_filter_post_type_link($link, $post) {
    if ($post->post_type != 'work') {
        return $link;
    }

    if ($cats = get_the_terms($post->ID, 'work_categories')) {
        $link = str_replace('%work_categories%', array_pop($cats)->slug, $link);
    }

    return $link;
}
add_filter('post_type_link', 'capstone_filter_post_type_link', 10, 2);
