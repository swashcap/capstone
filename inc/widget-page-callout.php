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
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);

        echo $before_widget;
        if (! empty($title)) {
            echo $before_title . $title . $after_title;
        }
        echo $after_widget;
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

        $page_id = 0;
        $title = ! empty($instance['title']) ? strip_tags($instance['title']) : '';
        $content = ! empty($instance['content']) ? esc_html($instance['content']) : '';
        $include_thumbnail = 1;
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
                <input name="<?php echo $this->get_field_name('include_thumbnail'); ?>" id="<?php echo $this->get_field_id('include_thumbnail'); ?>" type="checkbox" <?php checked(1, $include_thumbnail); ?> />
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
        $instance['testimonial'] = ! empty($new_instance['testimonial']) ? $new_instance['testimonial'] : '';
        $instance['show_image'] = $new_instance['show_image'] == 1 ? 1 : 0;

        return $instance;
    }
}
