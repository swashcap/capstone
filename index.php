<?php
/**
 * The main template file.
 *
 * @package capstone
 */

get_header(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-1">
                <main class="site__content" role="main">
                    <?php
                        if (have_posts()) :
                            while (have_posts()) :
                                the_post();

                                get_template_part('templates/partials/content');
                            endwhile; // have_posts()

                            capstone_paging_nav();
                        else : // have_posts()

                            get_template_part('templates/partials/content', 'none');

                        endif; // have_posts()
                    ?>
                </main><!-- .site__content -->
            </div>
            <div class="col-xs-12 col-sm-4 col-md-offset-1">
                <?php get_sidebar(); ?>
            </div>
        </div><!-- .row -->
    </div><!-- .container-fluid -->

<?php get_footer(); ?>
