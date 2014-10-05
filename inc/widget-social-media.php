<?php
/**
 * Social media widget.
 *
 * @package capstone
 */

class Capstone_Widget_Social_Media extends WP_Widget
{
    /**
     * Sets up the widget.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            'capstone_social_media',
            __('Social Media Links', 'capstone'),
            array(
                'classname'   => 'widget_capstone_social_media',
                'description' => __('Add social media links output as theme buttons', 'capstone')
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

        $item_output = '<li class="%1$s"><a href="%2$s" title="%3$s">%4$s</a></li>';

        if (! empty($instance)) :
            echo $before_widget;
            echo '<ul>';

            foreach (self::get_services() as $slug => $title) {
                if (isset($instance[$slug]) && ! empty($instance[$slug])) {
                    printf(
                        $item_output,
                        esc_attr('link-' . $slug),
                        esc_url($instance[$slug]),
                        esc_attr($title),
                        $title
                    );
                }
            }

            echo '</ul>';
            echo $after_widget;
        endif; // ! empty($instance)
    }

    /**
     * Outputs widget form in admin.
     *
     * @param  array $instance
     * @return void
     */
    public function form($instance)
    {
        $services = self::get_services();

        ?>
            <p><small><?php _e('Please enter full <abbr>URL</abbr>s to your profile for each social media service.', 'capstone'); ?></small></p>
        <?php
        foreach ($services as $slug => $title) :
            ?>
                <p>
                    <label for="<?php echo $this->get_field_id($slug); ?>"><?php echo $title; ?>:</label>
                    <input type="text" name="<?php echo $this->get_field_name($slug); ?>" value="<?php
                        if (isset($instance[$slug])) {
                            echo esc_attr($instance[$slug]);
                        }
                    ?>" id="<?php echo $this->get_field_id($slug); ?>" class="widefat code">
                </p>
            <?php
        endforeach;
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

        foreach (self::get_services() as $slug => $title) {
            if (isset($new_instance[$slug]) && ! empty($new_instance[$slug])) {
                $instance[$slug] = $new_instance[$slug];
            }
        }

        return $instance;
    }

    /**
     * Get social media services.
     *
     * @return array
     */
    private static function get_services()
    {
        return array(
            'facebook'  => __('Facebook'),
            'twitter'   => __('Twitter'),
            'linkedin'  => __('LinkedIn'),
            'google'    => __('Google+'),
            'tumblr'    => __('Tumblr'),
            'youtube'   => __('YouTube'),
            'virb'      => __('Virb'),
            'flickr'    => __('Flickr'),
            'instagram' => __('Instagram'),
            'pinterest' => __('Pinterest')
        );
    }
}
