<?php
/**
 * Page callout widget.
 *
 * @see     WP_Widget
 * @link    http://codex.wordpress.org/Widgets_API
 * @package capstone
 */
class Capstone_Widget_Page_Callout extends WP_Widget
{
    /**
     * Sets up the widget.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            'capstone_page_callout',
            __('Page Callout', 'capstone'),
            array(
                'classname' => 'widget_capstone_page_callout',
                'description' => __('Reference a page in a callout', 'capstone')
            ),
            array(
                'width' => 300
            )
        );
    }

    /**
     * Outputs widget contents.
     *
     * @param  array $args
     * @param  array $instance
     * @return void
     */
    public function widget($args, $instance)
    {
        if (! empty($instance['page_id'])) :
            extract($args);

            $title = apply_filters('widget_title', $instance['title']);

            $result = new WP_Query(array(
                'post_type' => 'page',
                'p'         => $instance['page_id']
            ));

            if ($result->have_posts()) :
                echo $before_widget;

                while($result->have_posts()) :
                    $result->the_post();

                    if (
                        ! empty($instance['include_thumbnail']) &&
                        $instance['include_thumbnail'] == 1 &&
                        has_post_thumbnail()
                    ) :
                        ?>
                            <div class="widget-thumbnail">
                                <a href="<?php the_permalink(); ?>" rel="bookmark">
                                    <?php capstone_avatar_picture(get_post_thumbnail_id()); ?>
                                </a>
                            </div><!-- .widget_thumbnail -->
                        <?php
                    endif; // ! empty($instance['include_thumbnail']) ...

                    if (! empty($title)) {
                        echo $before_title . $title . $after_title;
                    }

                    ?>
                        <div class="widget-content">
                            <?php echo apply_filters('the_content', $instance['content']); ?>
                        </div><!-- .widget_content -->
                    <?php

                    if (! empty($instance['button_text'])) :
                        ?>
                            <div class="widget-button">
                                <a href="<?php the_permalink(); ?>" class="btn btn-default" rel="bookmark">
                                    <?php echo esc_html($instance['button_text']); ?>
                                </a>

                            </div><!-- .widget-button -->
                        <?php
                    endif; // ! empty($instance['button_text'])
                endwhile; // $result->have_posts()

                echo $after_widget;

            endif; // $result->have_posts()
            wp_reset_query();

        endif; // ! empty($instance['page_id'])
    }

    /**
     * Outputs widget form in admin.
     *
     * @param  array $instance
     * @return void
     */
    public function form($instance)
    {
        global $wpdb;

        $page_id = ! empty($instance['page_id']) ? $instance['page_id'] : 0;
        $title = ! empty($instance['title']) ? strip_tags($instance['title']) : '';
        $content = ! empty($instance['content']) ? esc_html($instance['content']) : '';
        $include_thumbnail = isset($instance['include_thumbnail']) ? $instance['include_thumbnail'] : 1;
        $button_text = ! empty($instance['button_text']) ? strip_tags($instance['button_text']) : '';

        $pages = $wpdb->get_results($wpdb->prepare("
            SELECT ID, post_title
            FROM $wpdb->posts
            WHERE post_type=%s
            AND post_status=%s",
            'page', 'publish'));

        ?>
            <p>
                <label for="<?php echo $this->get_field_id('page_id'); ?>"><?php _e('Page:', 'capstone'); ?></label>
                <br />
                <select name="<?php echo $this->get_field_name('page_id'); ?>" id="<?php echo $this->get_field_id('page_id'); ?>">
                    <?php foreach ($pages as $page) : ?>
                        <option value="<?php echo esc_attr($page->ID); ?>" <?php selected($page_id, $page->ID); ?>><?php echo $page->post_title; ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
                <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" id="<?php echo $this->get_field_id('title'); ?>" class="widefat">
            </p>
            <textarea name="<?php echo $this->get_field_name('content'); ?>" id="<?php echo $this->get_field_id('content'); ?>" class="widefat" rows="8" cols="20"><?php echo $content; ?></textarea>
            <p>
                <input name="<?php echo $this->get_field_name('include_thumbnail'); ?>" value="1" id="<?php echo $this->get_field_id('include_thumbnail'); ?>" type="checkbox" <?php checked(1, $include_thumbnail, true); ?> />
                <label for="<?php echo $this->get_field_id('include_thumbnail'); ?>"><?php _e('Include thumbnail image?', 'capstone'); ?></label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('button_text'); ?>"><?php _e('Button Text', 'capstone'); ?></label>
                <input type="text" name="<?php echo $this->get_field_name('button_text'); ?>" value="<?php echo esc_attr($button_text); ?>" id="<?php echo $this->get_field_id('button_text'); ?>" class="widefat">
            </p>
        <?php
    }

    /**
     * Processes widget options on save.
     *
     * @param  array $new_instance The new options
     * @param  array $old_instance The previous options
     * @return array               Updated safe values to be saved
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();

        $instance['title'] = ! empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';
        $instance['page_id'] = ! empty($new_instance['page_id']) ? esc_attr($new_instance['page_id']) : '';
        $instance['content'] = ! empty($new_instance['content']) ? esc_html($new_instance['content']) : '';
        $instance['include_thumbnail'] = (isset($new_instance['include_thumbnail']) && $new_instance['include_thumbnail'] == 1) ? 1 : 0;
        $instance['button_text'] = ! empty($new_instance['button_text']) ? strip_tags($new_instance['button_text']) : '';

        return $instance;
    }
}
