<?php
/**
 * Custom taxonomy template for `work_categories` taxonomy.
 *
 * @package capstone
 */

get_header(); ?>

    <main class="site__content container-fluid" role="main">
        <div class="page-header">
            <?php
                /**
                 * @link https://wordpress.org/support/topic/taxonomy-title-output?replies=7#post-1522688
                 */
                global $wp_query;
                $term = $wp_query->get_queried_object();

                echo '<h1 class="page-title">'. $term->name . '</h1>';

                if (! empty($term->description)) :
            ?>
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <p class="lead"><?php echo $term->description; ?></p>
                    </div>
                </div>
            <?php
                endif; // ! empty($term->description))
            ?>
        </div><!-- .page-header -->

        <div class="row">
            <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
            ?>
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <?php get_template_part('templates/partials/work'); ?>
                </div>
            <?php
                    endwhile; // have_posts()

                    capstone_paging_nav();
                else : // have_posts()

                    get_template_part('templates/partials/content', 'none');

                endif; // have_posts()
            ?>
        </div><!-- .row -->
    </main><!-- .site__content -->

<?php get_footer(); ?>
