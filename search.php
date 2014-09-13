<?php
/**
 * The template for displaying search results pages.
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
                            <h1 class="page-title"><?php printf( __( 'Search Results for: &ldquo;%s&rdquo;', 'capstone' ), '<em>' . get_search_query() . '</em>' ); ?></h1>
                        </div>
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
