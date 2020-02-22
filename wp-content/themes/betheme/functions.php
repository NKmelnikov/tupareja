<?php
/**
 * Theme Functions
 *
 * @package Betheme
 * @author Muffin group
 * @link https://muffingroup.com
 */

use Admin\LadiesMenu;
use Admin\LadiesEdit;

define('MFN_THEME_VERSION', '21.5.4');

// theme related filters

add_filter('widget_text', 'do_shortcode');

add_filter('the_excerpt', 'shortcode_unautop');
add_filter('the_excerpt', 'do_shortcode');

/**
 * White Label
 * IMPORTANT: We recommend the use of Child Theme to change this
 */

defined('WHITE_LABEL') or define('WHITE_LABEL', false);

/**
 * textdomain
 */

load_theme_textdomain('betheme', get_template_directory() . '/languages'); // frontend
load_theme_textdomain('mfn-opts', get_template_directory() . '/languages'); // admin panel

/**
 * theme options
 */

require_once(get_theme_file_path('/muffin-options/theme-options.php'));

/**
 * theme functions
 */

$theme_disable = mfn_opts_get('theme-disable');

require_once(get_theme_file_path('/functions/theme-functions.php'));
require_once(get_theme_file_path('/functions/theme-head.php'));

// menu

require_once(get_theme_file_path('/functions/theme-menu.php'));
if (!isset($theme_disable['mega-menu'])) {
    require_once(get_theme_file_path('/functions/theme-mega-menu.php'));

}

// builder

require_once(get_theme_file_path('/functions/builder/class-mfn-builder.php'));

// post types

$post_types_disable = mfn_opts_get('post-type-disable');

require_once(get_theme_file_path('/functions/post-types/class-mfn-post-type.php'));

if (!isset($post_types_disable['client'])) {
    require_once(get_theme_file_path('/functions/post-types/class-mfn-post-type-client.php'));
}
if (!isset($post_types_disable['offer'])) {
    require_once(get_theme_file_path('/functions/post-types/class-mfn-post-type-offer.php'));
}
if (!isset($post_types_disable['portfolio'])) {
    require_once(get_theme_file_path('/functions/post-types/class-mfn-post-type-portfolio.php'));
}
if (!isset($post_types_disable['slide'])) {
    require_once(get_theme_file_path('/functions/post-types/class-mfn-post-type-slide.php'));
}
if (!isset($post_types_disable['testimonial'])) {
    require_once(get_theme_file_path('/functions/post-types/class-mfn-post-type-testimonial.php'));
}

if (!isset($post_types_disable['layout'])) {
    require_once(get_theme_file_path('/functions/post-types/class-mfn-post-type-layout.php'));
}
if (!isset($post_types_disable['template'])) {
    require_once(get_theme_file_path('/functions/post-types/class-mfn-post-type-template.php'));
}

require_once(get_theme_file_path('/functions/post-types/class-mfn-post-type-page.php'));
require_once(get_theme_file_path('/functions/post-types/class-mfn-post-type-post.php'));

// includes

require_once(get_theme_file_path('/includes/content-post.php'));
require_once(get_theme_file_path('/includes/content-portfolio.php'));

// shortcodes

require_once(get_theme_file_path('/functions/theme-shortcodes.php'));

// hooks

require_once(get_theme_file_path('/functions/theme-hooks.php'));

// sidebars

require_once(get_theme_file_path('/functions/theme-sidebars.php'));

// widgets

require_once(get_theme_file_path('/functions/widgets/class-mfn-widgets.php'));

// TinyMCE

require_once(get_theme_file_path('/functions/tinymce/tinymce.php'));

// plugins

require_once(get_theme_file_path('/functions/class-mfn-love.php'));
require_once(get_theme_file_path('/functions/plugins/visual-composer.php'));

// WooCommerce functions

if (function_exists('is_woocommerce')) {
    require_once(get_theme_file_path('/functions/theme-woocommerce.php'));
}

// hide activation and update specific parts

if (!mfn_opts_get('plugin-rev')) {
    if (function_exists('set_revslider_as_theme')) {
        set_revslider_as_theme();
    }
}

if (!mfn_opts_get('plugin-layer')) {
    add_action('layerslider_ready', 'mfn_layerslider_overrides');
    function mfn_layerslider_overrides()
    {
        $GLOBALS['lsAutoUpdateBox'] = false;
    }
}

if (!mfn_opts_get('plugin-visual')) {
    add_action('vc_before_init', 'mfn_vc_set_as_theme');
    function mfn_vc_set_as_theme()
    {
        vc_set_as_theme();
    }
}

// dashboard

if (is_admin()) {
    require_once(get_theme_file_path('/functions/admin/class-mfn-api.php'));
    require_once(get_theme_file_path('/functions/admin/class-mfn-helper.php'));
    require_once(get_theme_file_path('/functions/admin/class-mfn-update.php'));

    require_once(get_theme_file_path('/functions/admin/class-mfn-dashboard.php'));
    $mfn_dashboard = new Mfn_Dashboard();

    if (!isset($theme_disable['demo-data'])) {
        require_once(get_theme_file_path('/functions/importer/class-mfn-importer.php'));
    }

    require_once(get_theme_file_path('/functions/admin/tgm/class-mfn-tgmpa.php'));

    if (!mfn_is_hosted()) {
        require_once(get_theme_file_path('/functions/admin/class-mfn-status.php'));
    }

    require_once(get_theme_file_path('/functions/admin/class-mfn-support.php'));
    require_once(get_theme_file_path('/functions/admin/class-mfn-changelog.php'));
}

require_once '_Custom/Admin/LadiesMenu.php';
require_once '_Custom/Admin/LadiesEdit.php';
require_once '_Custom/Admin/MenMenu.php';
require_once '_Custom/Admin/MenEdit.php';

add_action('admin_menu', 'ladies_menu');
add_action('admin_menu', 'ladies_edit');
add_action('admin_menu', 'men_menu');
add_action('admin_menu', 'man_edit');


function ladies_menu() {
    return LadiesMenu::instance()->plugin_menu();
}

function ladies_edit() {
    return LadiesEdit::instance()->plugin_menu();
}
function men_menu() {
	return \Admin\MenMenu::instance()->plugin_menu();
}

function man_edit() {
	return \Admin\MenEdit::instance()->plugin_menu();
}
/**
 * @deprecated 21.0.5
 * Below constants are deprecated and will be removed soon
 * Please check if you use these constants in your Child Theme
 */

define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());

define('THEME_NAME', 'betheme');
define('THEME_VERSION', MFN_THEME_VERSION);

define('LIBS_DIR', get_template_directory() . '/functions');
define('LIBS_URI', get_template_directory() . '/functions');
