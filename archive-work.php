<?php
/**
 * Custom 'work' post type archive template.
 *
 * @package capstone
 */

$work_categories = get_terms(
    'work_categories',
    array(
        'orderby' => 'count',
        'order'   => 'DESC'
    )
);

query_posts(array(
    'post_type'      => 'work',
    'posts_per_page' => 0
));

get_header(); ?>

    <main class="site__content" role="main">
        <?php
            if (count($work_categories) !== 0) :
                foreach ($work_categories as $cat) :
                    $results = new WP_Query(array(
                        'orderby'        => 'menu_order',
                        'post_type'      => 'work',
                        'posts_per_page' => -1,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'work_categories',
                                'field'    => 'term_id',
                                'terms'    => $cat->term_id,
                            ),
                        ),
                    ));
        ?>
            <section class="container-fluid">
                <header class="page-header">
                    <h1><?php echo $cat->name; ?></h1>
                    <?php if (! empty($cat->description)) : ?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                                <p class="lead"><?php echo $cat->description; ?></p>
                            </div>
                        </div><!-- .row -->
                    <?php endif; ?>
                </header><!-- .page-header -->
                <div class="row">
                    <?php
                        while ($results->have_posts()) :
                            $results->the_post();
                    ?>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <?php get_template_part('templates/partials/work'); ?>
                        </div>
                    <?php
                        endwhile; // $results->have_posts()
                    ?>
                </div><!-- .row -->
            </section><!-- .container-fluid -->
        <?php
                    wp_reset_query();
                endforeach; // $work_categories as $cat
            else : // count($work_categories) !== 0

                get_template_part('templates/partials/content', 'none');

            endif; // count($work_categories) !== 0
        ?>
    </main><!-- .site__content -->

<?php get_footer(); ?>
