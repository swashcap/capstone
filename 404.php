<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package capstone
 */

get_header(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-1">
                <main class="site__content" role="main">
                    <section class="error-404 not-found">
                        <header class="page-header">
                            <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'capstone' ); ?></h1>
                        </header><!-- .page-header -->

                        <div class="page-content">
                            <p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'capstone' ); ?></p>

                            <?php get_search_form(); ?>
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->
                </main><!-- .site__content -->
            </div>
            <div class="col-xs-12 col-sm-4 col-md-offset-1">
                <aside class="site__sidebar widget-area" role="secondary">
                    <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

                    <?php if ( capstone_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
                    <div class="widget widget_categories">
                        <h2 class="widget-title"><?php _e( 'Most Used Categories', 'capstone' ); ?></h2>
                        <ul>
                        <?php
                            wp_list_categories( array(
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'show_count' => 1,
                                'title_li'   => '',
                                'number'     => 10,
                            ) );
                        ?>
                        </ul>
                    </div><!-- .widget -->
                    <?php endif; ?>

                    <?php
                        /* translators: %1$s: smiley */
                        $archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'capstone' ), convert_smilies( ':)' ) ) . '</p>';
                        the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
                    ?>

                    <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
                </aside><!-- .site__sidebar.widget-area -->
            </div>
        </div><!-- .row -->
    </div><!-- .container-fluid -->

<?php get_footer(); ?>
