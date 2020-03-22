<?php

namespace Admin;

use Service\MenApplicationAdmin;

class MenMenu
{
    // class instance
    static $instance;
    // customer WP_List_Table object
    public $MenApplicationAdmin;

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
            'Анкеты мужчин',
            'Анкеты мужчин',
            'manage_options',
            'men_applications',
            [$this, 'plugin_settings_page'],
            'dashicons-businessman',
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
        require_once( ABSPATH . 'wp-content/themes/betheme/_Custom/Service/MenApplicationAdmin.php');
        $this->MenApplicationAdmin = new MenApplicationAdmin();

    }


    /**
     * Plugin settings page
     */
    public function plugin_settings_page()
    {
        ?>
        <div class="wrap">
            <h2>Анкеты мужчин</h2>

	        <form class="menSearch" method="GET">
		        <input type="hidden" name="page" value="men_applications">
		        <input type="search" name="querySearch" placeholder="Например Имя или Фамилию" value="<?php if(isset($_GET['querySearch'])&& ($_GET['querySearch']!="")) echo $_GET['querySearch']?>">




		        <input type="submit" value="Поиск" class="button action">
	        </form>

            <div id="poststuff">
                <div id="post-body" class="metabox-holder">
                    <div id="post-body-content">
                        <div class="meta-box-sortables ui-sortable">
                            <form method="post">
                                <?php
                                $this->MenApplicationAdmin->prepare_items($_GET);
                                $this->MenApplicationAdmin->display(); ?>
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

