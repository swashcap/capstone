<?php
/**
 * Theme options.
 *
 * Add customizable options to the Capstone theme.
 *
 * @package capstone
 */

class Capstone_Theme_Options
{
    private static $slug = 'capstone';
    private static $handle = 'capstone_theme_options';

    public static function init()
    {
        add_action('admin_init', array(__CLASS__, 'register_settings'), 100);
        add_action('admin_menu', array(__CLASS__, 'add_admin_page'), 100);
    }

    public static function register_settings()
    {
        register_setting(self::$slug . '_options', self::$handle);
    }

    public static function add_admin_page()
    {
        add_theme_page(
            __('Theme Options'),
            __('Theme Options'),
            'edit_theme_options',
            'theme_options',
            array(__CLASS__, 'do_page')
        );
    }

    public static function do_page()
    {
        ?>
            <div class="wrap">
                <?php screen_icon(); ?>
                <h2><?php _e( 'Theme Options', 'snowpeak' ); ?></h2>
            </div><!-- .wrap -->
        <?php
    }
}

Capstone_Theme_Options::init();
