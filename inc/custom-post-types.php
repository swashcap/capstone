<?php

/**
 * Register custom post types and associated taxonomies.
 *
 * @return void
 */
function capstone_custom_post_types() {
    register_post_type('testimonial', array(
        'label'               => __('Testimonials', 'capstone'),
        'description'         => '',
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-format-quote',
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'hierarchical'        => false,
        'rewrite'             => array(
            'slug' => 'testimonial',
            'with_front' => false
        ),
        'query_var'           => true,
        'exclude_from_search' => true,
        'supports'            => array(
            'title',
            'editor',
            'excerpt',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author',
        ),
        'labels'              => array(
            'name'               => __('Testimonials', 'capstone'),
            'singular_name'      => __('Testimonial', 'capstone'),
            'menu_name'          => __('Testimonials', 'capstone'),
            'add_new'            => __('Add Testimonial', 'capstone'),
            'add_new_item'       => __('Add New Testimonial', 'capstone'),
            'edit'               => __('Edit', 'capstone'),
            'edit_item'          => __('Edit Testimonial', 'capstone'),
            'new_item'           => __('New Testimonial', 'capstone'),
            'view'               => __('View Testimonial', 'capstone'),
            'view_item'          => __('View Testimonial', 'capstone'),
            'search_items'       => __('Search Testimonials', 'capstone'),
            'not_found'          => __('No Testimonials Found', 'capstone'),
            'not_found_in_trash' => __('No Testimonials Found in Trash', 'capstone'),
            'parent'             => __('Parent Testimonial', 'capstone'),
        )
    ));

    register_post_type('work', array(
        'label'           => __('Works', 'capstone'),
        'description'     => '',
        'public'          => true,
        'has_archive'     => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'menu_icon'       => 'dashicons-images-alt',
        'capability_type' => 'post',
        'map_meta_cap'    => true,
        'hierarchical'    => true,
        'rewrite'         => array(
            'slug'       => 'work/%work_categories%',
            'with_front' => false
        ),
        'query_var'       => true,
        'supports'        => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',
        ),
        'labels'          => array(
            'name'               => __('Works', 'capstone'),
            'singular_name'      => __('Work', 'capstone'),
            'menu_name'          => __('Works', 'capstone'),
            'add_new'            => __('Add Work', 'capstone'),
            'add_new_item'       => __('Add New Work', 'capstone'),
            'edit'               => __('Edit', 'capstone'),
            'edit_item'          => __('Edit Work', 'capstone'),
            'new_item'           => __('New Work', 'capstone'),
            'view'               => __('View Work', 'capstone'),
            'view_item'          => __('View Work', 'capstone'),
            'search_items'       => __('Search Works', 'capstone'),
            'not_found'          => __('No Works Found', 'capstone'),
            'not_found_in_trash' => __('No Works Found in Trash', 'capstone'),
            'parent'             => __('Parent Work', 'capstone'),
        )
    ));

    register_taxonomy(
        'work_categories',
        array('work'),
        array(
            'hierarchical'      => true,
            'label'             => __('Categories', 'capstone'),
            'show_ui'           => true,
            'query_var'         => true,
            'show_admin_column' => false,
            'rewrite'           => array(
                'slug'       => 'work',
                'with_front' => false
            ),
            'labels'            => array(
                'search_items'               => __('Category', 'capstone'),
                'popular_items'              => '',
                'all_items'                  => '',
                'parent_item'                => '',
                'parent_item_colon'          => '',
                'edit_item'                  => '',
                'update_item'                => '',
                'add_new_item'               => '',
                'new_item_name'              => '',
                'separate_items_with_commas' => '',
                'add_or_remove_items'        => '',
                'choose_from_most_used'      => '',
            )
        )
    );
}

add_action('init', 'capstone_custom_post_types');
