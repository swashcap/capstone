<?php
/**
 * @see     WP_Widget
 * @link    http://codex.wordpress.org/Widgets_API
 * @package capstone
 */
class Capstone_Widget_Testimonial extends WP_Widget
{
    /**
     * Post type used by widget.
     *
     * @var string
     */
    private static $post_type = 'testimonial';

    /**
     * Sets up the widget.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            'capstone_testimonial',
            __('Testimonial', 'capstone'),
            array(
                'classname' => 'widget_capstone_testimonial',
                'description' => __('Include a testimonial', 'capstone')
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
        if (! empty($instance['testimonial'])) :
            extract($args);

            $title = apply_filters('widget_title', $instance['title']);

            $result = new WP_Query(array(
                'post_type' => self::$post_type,
                'p'         => $instance['testimonial']
            ));

        echo $before_widget;
        if (! empty($title)) {
            echo $before_title . $title . $after_title;
            echo '<div class="widget_content">';
            while($result->have_posts()) :
                $result->the_post();
                get_template_part('templates/partials/testimonial');
            endwhile; // $result->have_posts()
            echo '</div><!-- .widget_content -->';

            // echo '<pre><code>';
            // print_r($result);
            // echo '</code></pre>';
        }
        echo $after_widget;

        wp_reset_query();
        endif; // ! empty($instance['testimonial'])
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

        $title = ! empty($instance['title']) ? strip_tags($instance['title']) : '';
        $testimonial = ! empty($instance['testimonial']) ? $instance['testimonial'] : 0;

        if (! isset($instance['show_image'])) {
            $show_image = 1;
        } else {
            $show_image = $instance['show_image'] == 1 ? 1 : 0;
        }

        $results = $wpdb->get_results($wpdb->prepare("
            SELECT ID, post_title
            FROM $wpdb->posts
            WHERE post_type=%s
            AND post_status=%s",
            self::$post_type, 'publish'));

        if (count($results) > 0) :

        ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
                <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" id="<?php echo $this->get_field_id('title'); ?>" class="widefat">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('testimonial'); ?>"><?php _e('Testimonial:', 'capstone'); ?></label>
                <br />
                <select name="<?php echo $this->get_field_name('testimonial'); ?>" id="<?php echo $this->get_field_id('testimonial'); ?>">
                    <?php foreach ($results as $result) : ?>
                        <option value="<?php echo esc_attr($result->ID); ?>" <?php selected($testimonial, $result->ID); ?>><?php echo $result->post_title; ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <?php
                /**
                 * Hide this until the feature works.
                 *
                 * @todo Get this feature to work
                 *
                <p>
                    <input type="checkbox" name="<?php echo $this->get_field_name('show_image'); ?>" value="1" id="<?php echo $this->get_field_id('show_image'); ?>" <?php checked(1, $show_image); ?>/>
                    <label for="<?php echo $this->get_field_id('show_image'); ?>"><?php _e('Show image?', 'honesuckle_2014'); ?></label>
                </p>
                 */
            ?>
        <?php else : // count($results) > 0 ?>
            <p><?php _e(sprintf('To use this widget you must first <a href="%s">create a testimonial</a>.', esc_url('/wp-admin/post-new.php?post_type=' . self::$post_type))); ?></p>
        <?php

        endif; // count($results) > 0
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
