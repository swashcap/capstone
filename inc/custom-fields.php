<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_about-fields',
    'title' => 'About fields',
    'fields' => array (
      array (
        'key' => 'field_541fc5c49b965',
        'label' => 'Testimonial',
        'name' => '',
        'type' => 'tab',
      ),
      array (
        'key' => 'field_5404d22a757f8',
        'label' => 'Testimonial',
        'name' => 'testimonial',
        'type' => 'relationship',
        'return_format' => 'id',
        'post_type' => array (
          0 => 'testimonial',
        ),
        'taxonomy' => array (
          0 => 'all',
        ),
        'filters' => array (
          0 => 'search',
        ),
        'result_elements' => array (
          0 => 'post_type',
          1 => 'post_title',
        ),
        'max' => 1,
      ),
      array (
        'key' => 'field_5404ef5667d98',
        'label' => 'Call to Action',
        'name' => '',
        'type' => 'tab',
      ),
      array (
        'key' => 'field_5404ef2d241d8',
        'label' => 'Heading',
        'name' => 'call_to_action_heading',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5404ef42241d9',
        'label' => 'Text',
        'name' => 'call_to_action_text',
        'type' => 'textarea',
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 2,
        'formatting' => 'html',
      ),
      array (
        'key' => 'field_5404ef75cfd89',
        'label' => 'Button Link',
        'name' => 'call_to_action_button_link',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5404ef84cfd8a',
        'label' => 'Button Text',
        'name' => 'call_to_action_button_text',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'templates/about.php',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_call-to-action',
    'title' => 'Call to Action',
    'fields' => array (
      array (
        'key' => 'field_54306eaf72bec',
        'label' => 'Heading',
        'name' => 'call_to_action_heading',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_54306ed972bed',
        'label' => 'Content',
        'name' => 'call_to_action_content',
        'type' => 'textarea',
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 2,
        'formatting' => 'html',
      ),
      array (
        'key' => 'field_54306f0272bef',
        'label' => 'Button Link',
        'name' => 'call_to_action_button_link',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_54306ef672bee',
        'label' => 'Button Text',
        'name' => 'call_to_action_button_text',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'work',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_contact-fields',
    'title' => 'Contact Fields',
    'fields' => array (
      array (
        'key' => 'field_5404f1849b23d',
        'label' => 'Rates',
        'name' => '',
        'type' => 'tab',
      ),
      array (
        'key' => 'field_5404f1929b23e',
        'label' => 'Heading',
        'name' => 'rates_heading',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5404f19f9b23f',
        'label' => 'Content',
        'name' => 'rates_content',
        'type' => 'wysiwyg',
        'default_value' => '',
        'toolbar' => 'full',
        'media_upload' => 'no',
      ),
      array (
        'key' => 'field_5404f1bf9b240',
        'label' => 'Testimonials',
        'name' => '',
        'type' => 'tab',
      ),
      array (
        'key' => 'field_5404f1cb9b241',
        'label' => 'Testimonials',
        'name' => 'testimonials',
        'type' => 'relationship',
        'return_format' => 'id',
        'post_type' => array (
          0 => 'testimonial',
        ),
        'taxonomy' => array (
          0 => 'all',
        ),
        'filters' => array (
          0 => 'search',
        ),
        'result_elements' => array (
          0 => 'post_type',
          1 => 'post_title',
        ),
        'max' => 3,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'templates/contact.php',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_front-page-fields',
    'title' => 'Front Page Fields',
    'fields' => array (
      array (
        'key' => 'field_540f97f665fa1',
        'label' => 'Intro',
        'name' => '',
        'type' => 'tab',
      ),
      array (
        'key' => 'field_540f995f5f609',
        'label' => 'Heading',
        'name' => 'intro_heading',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_540f996c5f60a',
        'label' => 'Content',
        'name' => 'intro_content',
        'type' => 'textarea',
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 2,
        'formatting' => 'html',
      ),
      array (
        'key' => 'field_540f980165fa2',
        'label' => 'Work',
        'name' => '',
        'type' => 'tab',
      ),
      array (
        'key' => 'field_540f99e442337',
        'label' => 'Featured Work Item',
        'name' => 'work_item',
        'type' => 'relationship',
        'instructions' => 'Choose an item to feature.',
        'return_format' => 'id',
        'post_type' => array (
          0 => 'work',
        ),
        'taxonomy' => array (
          0 => 'all',
        ),
        'filters' => array (
          0 => 'search',
        ),
        'result_elements' => array (
          0 => 'post_title',
        ),
        'max' => 1,
      ),
      array (
        'key' => 'field_540f9923e1186',
        'label' => 'Heading',
        'name' => 'work_heading',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_540f9931e1187',
        'label' => 'Content',
        'name' => 'work_content',
        'type' => 'textarea',
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 2,
        'formatting' => 'html',
      ),
      array (
        'key' => 'field_540fe54909fbe',
        'label' => 'Button Text',
        'name' => 'work_button_text',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_540f981065fa3',
        'label' => 'About',
        'name' => '',
        'type' => 'tab',
      ),
      array (
        'key' => 'field_548caa9ea4248',
        'label' => 'Link',
        'name' => 'about_link',
        'type' => 'text',
        'instructions' => 'Enter a URL for this section.',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_540f9a1142338',
        'label' => 'Background Image',
        'name' => 'about_image',
        'type' => 'image',
        'save_format' => 'id',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array (
        'key' => 'field_540f98e5e1185',
        'label' => 'Heading',
        'name' => 'about_heading',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_540f9949e1188',
        'label' => 'Content',
        'name' => 'about_content',
        'type' => 'textarea',
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 2,
        'formatting' => 'html',
      ),
      array (
        'key' => 'field_540fe4bf9e482',
        'label' => 'Button Text',
        'name' => 'about_button_text',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_540f986a65fa5',
        'label' => 'Blog',
        'name' => '',
        'type' => 'tab',
      ),
      array (
        'key' => 'field_540f98cdb665a',
        'label' => 'Heading',
        'name' => 'blog_heading',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_540f986365fa4',
        'label' => 'Contact',
        'name' => '',
        'type' => 'tab',
      ),
      array (
        'key' => 'field_540fe0c1210b7',
        'label' => 'Background Image',
        'name' => 'contact_image',
        'type' => 'image',
        'save_format' => 'id',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array (
        'key' => 'field_540f9899b6659',
        'label' => 'Testimonial',
        'name' => 'contact_testimonial',
        'type' => 'relationship',
        'instructions' => 'Pick a testimonial to display in this section.',
        'return_format' => 'id',
        'post_type' => array (
          0 => 'testimonial',
        ),
        'taxonomy' => array (
          0 => 'all',
        ),
        'filters' => array (
          0 => 'search',
        ),
        'result_elements' => array (
          0 => 'post_title',
        ),
        'max' => 1,
      ),
      array (
        'key' => 'field_540fa1105fd44',
        'label' => 'Heading',
        'name' => 'contact_heading',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_540fe438c6da9',
        'label' => 'Content',
        'name' => 'contact_content',
        'type' => 'textarea',
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 2,
        'formatting' => 'html',
      ),
      array (
        'key' => 'field_540fe4687f65b',
        'label' => 'Button Text',
        'name' => 'contact_button_text',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5455637d418fa',
        'label' => 'Button Link',
        'name' => 'contact_button_link',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'page_type',
          'operator' => '==',
          'value' => 'front_page',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'acf_after_title',
      'layout' => 'no_box',
      'hide_on_screen' => array (
        0 => 'the_content',
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_page-fields',
    'title' => 'Page Fields',
    'fields' => array (
      array (
        'key' => 'field_541dfda02c64e',
        'label' => 'Intro Heading',
        'name' => 'intro_heading',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_54055287c598b',
        'label' => 'Intro Text',
        'name' => 'intro_text',
        'type' => 'textarea',
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 2,
        'formatting' => 'html',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'templates/about.php',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
      array (
        array (
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'templates/contact.php',
          'order_no' => 0,
          'group_no' => 1,
        ),
      ),
    ),
    'options' => array (
      'position' => 'acf_after_title',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_testimonials-fields',
    'title' => 'Testimonials Fields',
    'fields' => array (
      array (
        'key' => 'field_5404d16813abf',
        'label' => 'Name',
        'name' => 'name',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5404d17213ac0',
        'label' => 'Source',
        'name' => 'source',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'testimonial',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'acf_after_title',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_work-fields',
    'title' => 'Work Fields',
    'fields' => array (
      array (
        'key' => 'field_549613f806c5d',
        'label' => 'Show Location and Date?',
        'name' => 'show_location_and_date',
        'type' => 'true_false',
        'message' => '',
        'default_value' => 0,
      ),
      array (
        'key' => 'field_54148ec622fc0',
        'label' => 'Location',
        'name' => 'location',
        'type' => 'text',
        'conditional_logic' => array (
          'status' => 1,
          'rules' => array (
            array (
              'field' => 'field_549613f806c5d',
              'operator' => '==',
              'value' => '1',
            ),
          ),
          'allorany' => 'all',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_54148ece22fc1',
        'label' => 'Event Date',
        'name' => 'event_date',
        'type' => 'date_picker',
        'conditional_logic' => array (
          'status' => 1,
          'rules' => array (
            array (
              'field' => 'field_549613f806c5d',
              'operator' => '==',
              'value' => '1',
            ),
          ),
          'allorany' => 'all',
        ),
        'date_format' => 'yymmdd',
        'display_format' => 'dd/mm/yy',
        'first_day' => 1,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'work',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'acf_after_title',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}
