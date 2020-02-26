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
            'Анкеты девушек',
            'Анкеты девушек',
            'manage_options',
            'ladies_applications',
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
	        <link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/libs/jquery-ui.css">
	        <link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/scss/ladies/ladiesAdmin.css">
	        <h2>Анкеты девушек</h2>
			<form class="ladiesSearch" method="GET">
				<input type="hidden" name="page" value="ladies_applications">
				<input type="search" name="ladiesSearch" placeholder="Например Имя или Фамилию" value="<?php if(isset($_GET['ladiesSearch'])&& ($_GET['ladiesSearch']!="")) echo $_GET['ladiesSearch']?>">

				<div class="filterAgeWrap">
					<label for="ladiesAge">Возраст:</label>
					<div class="slideAge">
						<input type="text" name="ladiesMinAge" id="ladiesMinAge" class="inputLadiesAge" readonly value="">
						<span>-</span>
						<input type="text" name="ladiesMaxAge" id="ladiesMaxAge" class="inputLadiesAge" readonly value="">
						<div id="slider-range"></div>
					</div>
				</div>


				<script src="/wp-content/themes/betheme/_Custom/_static/libs/jquery-1.12.4.js"></script>
				<script src="/wp-content/themes/betheme/_Custom/_static/libs/jquery-ui.js"></script>
				<script>
                  $( function() {
                    $("#slider-range").slider({
                      range: true,
                      min: <?php echo $this->ladiesApplicationAdmin->get_minAge()?>,
                      max: <?php echo $this->ladiesApplicationAdmin->get_maxAge()?>,
                      values: [<?php if(isset($_GET['ladiesMinAge'])&& ($_GET['ladiesMinAge']!="")) {echo $_GET['ladiesMinAge'];}else {echo $this->ladiesApplicationAdmin->get_minAge();}?>,
	                            <?php if(isset($_GET['ladiesMaxAge'])&& ($_GET['ladiesMaxAge']!="")) {echo $_GET['ladiesMaxAge'];}else {echo $this->ladiesApplicationAdmin->get_maxAge();}?>],
                      slide: function (event, ui) {
                        $("#ladiesMinAge").val(ui.values[0]);
                        $("#ladiesMaxAge").val(ui.values[1]);
                      }
                    });
                    $("#ladiesMinAge").val($("#slider-range").slider('values',0));
                    $("#ladiesMaxAge").val($("#slider-range").slider('values',1));

                  } );
				</script>

				<input type="submit" value="Поиск" class="button action">

			</form>
            <div id="poststuff">
                <div id="post-body" class="metabox-holder">
                    <div id="post-body-content">
                        <div class="meta-box-sortables ui-sortable">
                            <form method="post">
                                <?php
	                                    $this->ladiesApplicationAdmin->prepare_items($_GET);
	                                    $this->ladiesApplicationAdmin->display();
                                 ?>
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

