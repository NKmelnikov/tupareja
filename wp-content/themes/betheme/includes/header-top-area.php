<?php
/**
 * @package Betheme
 * @author Muffin group
 * @link https://muffingroup.com
 */
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$customHelper = new \Helper\CustomHelper();
$customHelper::build();
$action_bar = mfn_opts_get('action-bar');

$translate['wpml-no'] = mfn_opts_get('translate') ? mfn_opts_get('translate-wpml-no', 'No translations available for this page') : __('No translations available for this page', 'betheme');
?>

<?php if (('1' === $action_bar) || isset($action_bar['show'])): ?>
  <div id="Action_bar">
    <div class="container">
      <div class="column one">

          <?php
          get_template_part('includes/include', 'slogan');

          if (has_nav_menu('social-menu')) {
              mfn_wp_social_menu();
          } else {
              get_template_part('includes/include', 'social');
          }
          ?>

      </div>
    </div>
  </div>
<?php endif; ?>

<?php
if (mfn_header_style(true) == 'header-overlay') {

    // overlay menu

    echo '<div id="Overlay">';
    mfn_wp_overlay_menu();
    echo '</div>';

    // button

    echo '<a class="overlay-menu-toggle" href="#">';
    echo '<i class="open icon-menu-fine"></i>';
    echo '<i class="close icon-cancel-fine"></i>';
    echo '</a>';
}
$homeUrlRu = $customHelper::instance()->host_ru();
$homeUrlES = $customHelper::instance()->host_es();
?>

<div id="Top_bar">
  <div class="container">
    <div class="column one">
      <ul class="main-translation">
        <li id="menu-item-wpglobus_menu_switch_es" class="menu-item menu-item-type-custom menu-item-object-custom menu_item_wpglobus_menu_switch wpglobus-selector-link wpglobus-current-language">
          <a href="<?= $homeUrlES ?>"><span><span class="wpglobus_flag wpglobus_language_name wpglobus_flag_es"></span></span></a>
        </li>
        <li id="menu-item-wpglobus_menu_switch_ru" class="menu-item menu-item-type-custom menu-item-object-custom sub_menu_item_wpglobus_menu_switch wpglobus-selector-link">
          <a href="<?= $homeUrlRu ?>"><span><span class="wpglobus_flag wpglobus_language_name wpglobus_flag_ru"></span></span></a>
        </li>
      </ul>
      <div class="heart-box heart-box-main-header">
        <img class="heart-box__heart-small rotated header-section hs1" src="/wp-content/themes/betheme/_Custom/_static/img/small-left.png" alt="">
        <img class="heart-box__heart-medium header-section hs2" src="/wp-content/themes/betheme/_Custom/_static/img/medium-right.png" alt="">
      </div>

      <div class="header-special-mobile">
          <?php get_template_part('includes/include', 'logo'); ?>
        <p class="header-special-mobile__title">International Matchmaking Office</p>
        <a class="responsive-menu-toggle" href="#"><i class="icon-menu-fine"></i><a>
            <nav id="menu">
              <ul id="menu-menu-3" class="menu menu-main">
                <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-82 current_page_item">
                  <a href="<?= get_home_url() ?>"><span><?php _e('header_main', 'betheme') ?></span></a>
                </li>
                <li id="menu-item-13" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="<?= get_home_url() .'/about/' ?>"><span><?php _e('header_about_us', 'betheme') ?></span></a>
                </li>
                <li id="menu-item-14" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="<?= get_home_url() .'/our-service/' ?>"><span><?php _e('header_service', 'betheme') ?></span></a>
                </li>
                  <?php if (get_locale() === 'ru_RU'): ?>
                    <li id="menu-item-15" class="menu-item menu-item-type-post_type menu-item-object-page">
                      <a href="<?= get_home_url() .'/recommendations-lady/' ?>"><span><?php _e('header_lady_tips', 'betheme') ?></span></a>
                    </li>
                  <?php else: ?>
                    <li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page">
                      <a href="<?= get_home_url() .'/recommendations-men/' ?>"><span><?php _e('header_man_tips', 'betheme') ?></span></a>
                    </li>
                  <?php endif; ?>
                <li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="<?= get_home_url() .'/for-ladies/' ?>"><span><?php _e('header_lady_application', 'betheme') ?></span></a>
                </li>
                <li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="<?= get_home_url() .'/men-application/' ?>"><span><?php _e('header_man_application', 'betheme') ?></span></a>
                </li>
                <li id="menu-item-19" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="<?= get_home_url() .'/contact/' ?>"><span><?php _e('header_contacts', 'betheme') ?></span></a>
                </li>
              </ul>
            </nav>
      </div>
      <script>
          $('.responsive-menu-toggle').click(function () {
              $('#menu').toggleClass('active');
          })
      </script>


      <div class="top_bar_left clearfix">

          <?php get_template_part('includes/include', 'logo'); ?>
        <div class="header-right-block">
          <div class="header-title">
            <h1>International Matchmaking Office</h1>
          </div>
          <div class="menu_wrapper">
              <?php
              if ((mfn_header_style(true) != 'header-overlay') && (mfn_opts_get('menu-style') != 'hide')) {
                  // main menu

                  ?>
                <nav id="menu">
                  <ul id="menu-menu-1" class="menu menu-main">
                    <li id="menu-item-87" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-82 current_page_item">
                      <a href="<?= get_home_url() ?>"><span><?php _e('header_main', 'betheme') ?></span></a>
                    </li>
                    <li id="menu-item-86" class="menu-item menu-item-type-post_type menu-item-object-page">
                      <a href="<?= get_home_url() .'/about/' ?>"><span><?php _e('header_about_us', 'betheme') ?></span></a>
                    </li>
                    <li id="menu-item-107" class="menu-item menu-item-type-post_type menu-item-object-page service-dropdown">
                      <a href="<?= get_home_url() .'/our-service/' ?>"><span><?php _e('header_service', 'betheme') ?> </span><span class="triangle-turn">&#9668;</span></a>
                      <div class="service-dropdown-content">
                        <a href="<?= get_home_url() .'/our-service/dates-ucraine/' ?>"><span><?php _e('service_title_1', 'betheme') ?></span></a>
                        <a href="<?= get_home_url() .'/our-service/trip-to-spain/' ?>"><span><?php _e('service_title_2', 'betheme') ?></span></a>
                        <a href="<?= get_home_url() .'/our-service/event-dates/' ?>"><span><?php _e('service_title_3', 'betheme') ?></span></a>
                        <a href="<?= get_home_url() .'/our-service/translator/' ?>"><span><?php _e('service_title_4', 'betheme') ?></span></a>
                        <a href="<?= get_home_url() .'/our-service/transfer/' ?>"><span><?php _e('service_title_5', 'betheme') ?></span></a>
                        <a href="<?= get_home_url() .'/our-service/flowers/' ?>"><span><?php _e('service_title_6', 'betheme') ?></span></a>
                        <a href="<?= get_home_url() .'/our-service/wedding/' ?>"><span><?php _e('service_title_7', 'betheme') ?></span></a>
                      </div>
                    </li>
                      <?php if (get_locale() === 'ru_RU'): ?>
                        <li id="menu-item-137" class="menu-item menu-item-type-post_type menu-item-object-page service-dropdown">
                          <a href="<?= get_home_url() .'/recommendations-lady/' ?>"><span><?php _e('header_lady_tips', 'betheme') ?></span><span class="triangle-turn">&#9668;</span></a>
                          <div class="service-dropdown-content">
                            <a href="<?= get_home_url() .'/recommendations-lady/ua-es-man/' ?>"><span><?php _e('rec_title_1', 'betheme') ?></span></a>
                            <a href="<?= get_home_url() .'/recommendations-lady/ladies-mistakes/' ?>"><span><?php _e('rec_title_2', 'betheme') ?></span></a>
                            <a href="<?= get_home_url() .'/recommendations-lady/es-man/' ?>"><span><?php _e('rec_title_3', 'betheme') ?></span></a>
                            <a href="<?= get_home_url() .'/recommendations-lady/es-attitude/' ?>"><span><?php _e('rec_title_4', 'betheme') ?></span></a>
                          </div>
                        </li>
                      <?php else: ?>
                        <li id="menu-item-138" class="menu-item menu-item-type-post_type menu-item-object-page service-dropdown">
                          <a href="<?= get_home_url() .'/recommendations-men/' ?>"><span><?php _e('header_man_tips', 'betheme') ?></span><span class="triangle-turn">&#9668;</span></a>
                          <div class="service-dropdown-content">
                            <a href="<?= get_home_url() .'/recommendations-men/ua-es-lady/' ?>"><span><?php _e('rec_title_5', 'betheme') ?></span></a>
                            <a href="<?= get_home_url() .'/recommendations-men/men-mistakes/' ?>"><span><?php _e('rec_title_6', 'betheme') ?></span></a>
                            <a href="<?= get_home_url() .'/recommendations-men/ua-lady/' ?>"><span><?php _e('rec_title_7', 'betheme') ?></span></a>
                            <a href="<?= get_home_url() .'/recommendations-men/ua-attitude/' ?>"><span><?php _e('rec_title_8', 'betheme') ?></span></a>
                          </div>
                        </li>
                      <?php endif; ?>
                    <li id="menu-item-139" class="menu-item menu-item-type-post_type menu-item-object-page">
                      <a href="<?= get_home_url() .'/for-ladies/' ?>"><span><?php _e('header_lady_application', 'betheme') ?></span></a>
                    </li>
                    <li id="menu-item-140" class="menu-item menu-item-type-post_type menu-item-object-page">
                      <a href="<?= get_home_url() .'/men-application/' ?>"><span><?php _e('header_man_application', 'betheme') ?></span></a>
                    </li>
                    <li id="menu-item-141" class="menu-item menu-item-type-post_type menu-item-object-page">
                      <a href="<?= get_home_url() .'/contact/' ?>"><span><?php _e('header_contacts', 'betheme') ?></span></a>
                    </li>
                  </ul>
                </nav>
                <script>
                    $('.service-dropdown').mouseenter(function () {
                        $(this).find('.triangle-turn').html('&#9660');
                    })
                    $('.service-dropdown').mouseleave(function () {
                        $(this).find('.triangle-turn').html('&#9668');
                    })
                </script>
                  <?php

                  // responsive menu button

                  $mb_class = '';
                  if (mfn_opts_get('header-menu-mobile-sticky')) {
                      $mb_class .= ' is-sticky';
                  }

                  echo '<a class="responsive-menu-toggle ' . esc_attr($mb_class) . '" href="#">';
                  if ($menu_text = trim(mfn_opts_get('header-menu-text'))) {
                      echo '<span>' . wp_kses($menu_text, mfn_allowed_html()) . '</span>';
                  } else {
                      echo '<i class="icon-menu-fine"></i>';
                  }
                  echo '</a>';
              }
              ?>
          </div>
        </div>

      </div>

        <?php
        if (!mfn_opts_get('top-bar-right-hide')) {
            get_template_part('includes/header', 'top-bar-right');
        }
        ?>

    </div>
  </div>
</div>
