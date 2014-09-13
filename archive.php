<?php
/**
 * The template for displaying archive pages.
 *
 * @package capstone
 */

get_header(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-1">
                <main class="site__content" role="main">
                    <?php if (have_posts()) : ?>
                        <div class="page-header">
                            <h1 class="page-title">
                                <?php
                                    if (is_category()) {
                                        single_cat_title();
                                    } elseif (is_tag()) {
                                        single_tag_title();
                                    } elseif (is_author()) {
                                        printf(__('Author: %s', 'capstone'), '<span class="vcard">' . get_the_author() . '</span>');
                                    } elseif (is_day()) {
                                        printf(__('Day: %s', 'capstone'), '<span>' . get_the_date() . '</span>');
                                    } elseif (is_month()) {
                                        printf(__('Month: %s', 'capstone'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'capstone')) . '</span>');
                                    } elseif (is_year()) {
                                        printf(__('Year: %s', 'capstone'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'capstone')) . '</span>');
                                    } elseif (is_tax('post_format', 'post-format-aside')) {
                                        _e('Asides', 'capstone');
                                    } elseif (is_tax('post_format', 'post-format-gallery')) {
                                        _e('Galleries', 'capstone');
                                    } elseif (is_tax('post_format', 'post-format-image')) {
                                        _e('Images', 'capstone');
                                    } elseif (is_tax('post_format', 'post-format-video')) {
                                        _e('Videos', 'capstone');
                                    } elseif (is_tax('post_format', 'post-format-quote')) {
                                        _e('Quotes', 'capstone');
                                    } elseif (is_tax('post_format', 'post-format-link')) {
                                        _e('Links', 'capstone');
                                    } elseif (is_tax('post_format', 'post-format-status')) {
                                        _e('Statuses', 'capstone');
                                    } elseif (is_tax('post_format', 'post-format-audio')) {
                                        _e('Audios', 'capstone');
                                    } elseif (is_tax('post_format', 'post-format-chat')) {
                                        _e('Chats', 'capstone');
                                    } else {
                                        _e('Archives', 'capstone');
                                    }
                                ?>
                            </h1>
                            <?php
                                // Show an optional term description.
                                $term_description = term_description();
                                if (! empty($term_description)) :
                                    printf('<div class="taxonomy-description">%s</div>', $term_description);
                                endif;
                            ?>
                        </div><!-- .page-header -->
                        <?php
                            while (have_posts()) :
                                the_post();

                                get_template_part('templates/partials/content', 'search');
                            endwhile; // have_posts()

                            capstone_paging_nav();
                        ?>
                    <?php else : // have_posts() ?>
                        <?php get_template_part('templates/partials/content', 'none'); ?>
                    <?php endif; // have_posts() ?>

                </main><!-- .site__content -->
            </div>
            <div class="col-xs-12 col-sm-4 col-md-offset-1">
                <?php get_sidebar(); ?>
            </div>
        </div><!-- .row -->
    </div><!-- .container-fluid -->

<?php get_footer(); ?>
