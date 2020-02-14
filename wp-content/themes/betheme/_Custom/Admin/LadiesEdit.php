<?php


namespace Admin;


use Service\LadiesApplicationAdmin;

class LadiesEdit
{
    // class instance
    static $instance;
    // customer WP_List_Table object
    public $ladiesApplicationAdmin;

    // class constructor
    public function __construct()
    {
        add_filter('set-screen-option', [__CLASS__, 'set_screen'], 10, 3);
        add_action('admin_menu', [$this, 'plugin_menu']);
    }

    public static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function set_screen($status, $option, $value)
    {
        return $value;
    }

    public function plugin_menu()
    {

        $hook = add_menu_page(
            'Редактировать анкету',
            'Редактировать анкету',
            'manage_options',
            'lady_edit',
            [$this, 'plugin_settings_page'],
            'dashicons-businesswoman',
            1

        );

        add_action("load-$hook", [$this, 'screen_option']);

    }

    /**
     * Screen options
     */
    public function screen_option()
    {
        $option = 'per_page';
        $args = [];

        add_screen_option($option, $args);
    }
    /**
     * Plugin settings page
     */
    public function plugin_settings_page()
    {
        require_once __DIR__ . '/../editLady.php';
    }
}
