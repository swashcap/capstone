<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package capstone
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}

?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
                printf(_nx('One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'capstone'),
                    number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>');
            ?>
        </h2>

        <?php
            // Are there comments to navigate through?
            if (get_comment_pages_count() > 1 && get_option('page_comments')) :
        ?>
            <nav id="comment-nav-above" class="comment-navigation" role="navigation">
                <h1 class="sr-only"><?php _e('Comment navigation', 'capstone'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'capstone')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'capstone')); ?></div>
            </nav><!-- #comment-nav-above -->
        <?php
            endif;
        ?>

        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'avatar_size' => 120,

                    //'callback'   => 'capstone_list_comments',
                    'style'       => 'ol',
                    'short_ping'  => true,
                ) );
            ?>
        </ol><!-- .comment-list -->

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav id="comment-nav-below" class="comment-navigation" role="navigation">
                <h1 class="sr-only"><?php _e('Comment navigation', 'capstone'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__( '&larr; Older Comments', 'capstone')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'capstone')); ?></div>
            </nav><!-- #comment-nav-below -->
        <?php endif; // check for comment navigation ?>

    <?php endif; // have_comments() ?>

    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (! comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(),'comments')) :
    ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'capstone'); ?></p>
    <?php endif; ?>

    <?php
        /**
         * @link http://codex.wordpress.org/Function_Reference/comment_form
         */
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $req_text = ' <span class="required">' . __('(required)', 'capstone') . '</span>';
        $aria_req = ( $req ? " aria-required='true'" : '' );

        comment_form(array(
            'comment_field' => '<div class="form-group comment-form-comment">' .
                '<label for="comment">' . _x('Comment', 'noun') . $req_text . '</label> ' .
                '<textarea id="comment" name="comment" rows="3" class="form-control" aria-required="true"></textarea>' .
                '</div>',
            'must_log_in' => '<div class="alert alert-warning" role="alert">' .
                sprintf(
                    __('You must be <a href="%s" class="alert-link">logged in</a> to post a comment.'),
                    wp_login_url(apply_filters('the_permalink', get_permalink()))
                ) . '</div>',
            'comment_notes_before' => '',
            'comment_notes_after' => '<span class="help-block">' .
                __('Your email address will not be published.', 'capstone') .
                '</span>',
            'fields' => array(
                'author' =>
                    '<div class="form-group comment-form-author">' .
                    '<label for="author">' . __('Name', 'domainreference') .
                    ($req ? $req_text : '') . '</label>' .
                    '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '"' .
                    ' class="form-control" ' . $aria_req . ' /></div>',
                'email' =>
                    '<div class="form-group comment-form-email">' .
                    '<label for="email">' . __('Email', 'domainreference') .
                    ($req ? $req_text : '') . '</label>' .
                    '<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '"' .
                    ' class="form-control" ' . $aria_req . ' /></div>',
                'url' =>
                    '<div class="form-group comment-form-url">' .
                    '<label for="url">' . __('Website', 'domainreference') . '</label>' .
                    '<input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '"' .
                    ' class="form-control" /></div>',
            ),
        ));
    ?>

</div><!-- #comments -->
