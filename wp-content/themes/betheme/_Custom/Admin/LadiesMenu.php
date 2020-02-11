<?php

namespace Admin;

use Service\LadiesApplicationAdmin;

class LadiesMenu
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
            'asdasd',
            'Анкеты девушек',
            'manage_options',
            'wp_list_table_class',
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
        $args = [
            'label' => 'Customers',
            'default' => 10,
            'option' => 'customers_per_page'
        ];

        add_screen_option($option, $args);
        require_once( ABSPATH . 'wp-content/themes/betheme/_Custom/Service/LadiesApplicationAdmin.php');
        $this->ladiesApplicationAdmin = new LadiesApplicationAdmin();

    }


    /**
     * Plugin settings page
     */
    public function plugin_settings_page()
    {
        ?>
        <div class="wrap">
            <h2>Анкеты девушек</h2>

            <div id="poststuff">
                <div id="post-body" class="metabox-holder">
                    <div id="post-body-content">
                        <div class="meta-box-sortables ui-sortable">
                            <form method="post">
                                <?php
                                $this->ladiesApplicationAdmin->prepare_items();
                                $this->ladiesApplicationAdmin->display(); ?>
                            </form>
                        </div>
                    </div>
                </div>
                <br class="clear">
            </div>
        </div>
        <?php
    }
}

