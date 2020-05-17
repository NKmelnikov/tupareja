<div class="heart-box heart-box-main-header">
  <img class="heart-box__heart-small footer-section hs10" src="/wp-content/themes/betheme/_Custom/_static/img/small-left.png" alt="">
  <img class="heart-box__heart-medium footer-section hs11" src="/wp-content/themes/betheme/_Custom/_static/img/medium-right.png" alt="">
</div>
<footer id="Footer" class="clearfix">
    <?php if (get_locale() === 'ru_RU'): ?>
      <div class="social">
          <?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
      </div>
    <?php endif; ?>
  <div class="top_bar_left clearfix">

      <?php get_template_part('includes/include',
          'logo'); ?>

    <div class="header-right-block">
      <div class="header-title">
        <h1>International Matchmaking Office</h1>
      </div>
      <div class="menu_wrapper">
          <?php
          if ((mfn_header_style(true) != 'header-overlay') && (mfn_opts_get('menu-style') != 'hide')) {

              // main menu

              ?>
            <nav id="menu-bot">
              <ul id="menu-menu-2" class="menu menu-main">
                <li id="menu-item-11" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-82">
                  <a href="<?= get_home_url() ?>"><span><?php _e('header_main',
                              'betheme') ?></span></a>
                </li>
                <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="<?= get_home_url() . '/#main-gallery' ?>"><span><?php _e('header_our_ladies',
                              'betheme') ?></span></a>
                </li>
                <li id="menu-item-13" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="<?= get_home_url() . '/about/' ?>"><span><?php _e('header_about_us',
                              'betheme') ?></span></a>
                </li>
                  <?php if (get_locale() !== 'ru_RU'): ?>
                    <li id="menu-item-14" class="menu-item menu-item-type-post_type menu-item-object-page service-dropdown">
                      <a href="<?= get_home_url() . '/our-service/' ?>"><span><?php _e('header_service',
                                  'betheme') ?> </span><span class="triangle-turn">&#9668;</span></a>
                      <div class="service-dropdown-content up1">
                        <a href="<?= get_home_url() . '/our-service/dates-online/' ?>"><span><?php _e('service_title_0',
                                    'betheme') ?></span></a>
                        <a href="<?= get_home_url() . '/our-service/dates-ucraine/' ?>"><span><?php _e('service_title_1',
                                    'betheme') ?></span></a>
                        <a href="<?= get_home_url() . '/our-service/trip-to-spain/' ?>"><span><?php _e('service_title_2',
                                    'betheme') ?></span></a>
                        <!--                        <a href="--><? //= get_home_url() . '/our-service/event-dates/' ?><!--"><span>--><?php //_e('service_title_3','betheme') ?><!--</span></a>-->
                        <!--                        <a href="--><? //= get_home_url() . '/our-service/translator/' ?><!--"><span>--><?php //_e('service_title_4','betheme') ?><!--</span></a>-->
                        <!--                        <a href="--><? //= get_home_url() .'/our-service/transfer/' ?><!--"><span>--><?php //_e('service_title_5', 'betheme') ?><!--</span></a>-->
                        <a href="<?= get_home_url() . '/our-service/flowers/' ?>"><span><?php _e('service_title_6',
                                    'betheme') ?></span></a>
                        <!--                        <a href="--><? //= get_home_url() .'/our-service/wedding/' ?><!--"><span>--><?php //_e('service_title_7', 'betheme') ?><!--</span></a>-->
                      </div>
                    </li>
                  <?php endif; ?>
                  <?php if (get_locale() === 'ru_RU'): ?>
                    <li id="menu-item-15" class="menu-item menu-item-type-post_type menu-item-object-page service-dropdown">
                      <a href="<?= get_home_url() . '/recommendations-lady/' ?>"><span><?php _e('header_lady_tips',
                                  'betheme') ?></span><span class="triangle-turn">&#9668;</span></a>
                      <div class="service-dropdown-content up">
                        <a href="<?= get_home_url() . '/recommendations-lady/ua-es-man/' ?>"><span><?php _e('rec_title_1',
                                    'betheme') ?></span></a>
                        <a href="<?= get_home_url() . '/recommendations-lady/ladies-mistakes/' ?>"><span><?php _e('rec_title_2',
                                    'betheme') ?></span></a>
                        <a href="<?= get_home_url() . '/recommendations-lady/es-man/' ?>"><span><?php _e('rec_title_3',
                                    'betheme') ?></span></a>
                        <a href="<?= get_home_url() . '/recommendations-lady/es-attitude/' ?>"><span><?php _e('rec_title_4',
                                    'betheme') ?></span></a>
                      </div>
                    </li>
                  <?php else: ?>
                    <li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page service-dropdown">
                      <a href="<?= get_home_url() . '/recommendations-men/' ?>"><span><?php _e('header_man_tips',
                                  'betheme') ?></span><span class="triangle-turn">&#9668;</span></a>
                      <div class="service-dropdown-content up">
                        <a href="<?= get_home_url() . '/recommendations-men/ua-es-lady/' ?>"><span><?php _e('rec_title_5',
                                    'betheme') ?></span></a>
                        <a href="<?= get_home_url() . '/recommendations-men/men-mistakes/' ?>"><span><?php _e('rec_title_6',
                                    'betheme') ?></span></a>
                        <a href="<?= get_home_url() . '/recommendations-men/ua-lady/' ?>"><span><?php _e('rec_title_7',
                                    'betheme') ?></span></a>
                        <a href="<?= get_home_url() . '/recommendations-men/ua-attitude/' ?>"><span><?php _e('rec_title_8',
                                    'betheme') ?></span></a>
                      </div>
                    </li>
                  <?php endif; ?>
                <li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="<?= get_home_url() . '/for-ladies/' ?>"><span><?php _e('header_lady_application',
                              'betheme') ?></span></a>
                </li>
                <li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="<?= get_home_url() . '/men-application/' ?>"><span><?php _e('header_man_application',
                              'betheme') ?></span></a>
                </li>
                <li id="menu-item-19" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="<?= get_home_url() . '/contact/' ?>"><span><?php _e('header_contacts',
                              'betheme') ?></span></a>
                </li>
              </ul>
            </nav>

              <?php

              // responsive menu button

              $mb_class = '';
              if (mfn_opts_get('header-menu-mobile-sticky')) {
                  $mb_class .= ' is-sticky';
              }

              echo '<a class="responsive-menu-toggle ' . esc_attr($mb_class) . '" href="#">';
              if ($menu_text = trim(mfn_opts_get('header-menu-text'))) {
                  echo '<span>' . wp_kses($menu_text,
                          mfn_allowed_html()) . '</span>';
              } else {
                  echo '<i class="icon-menu-fine"></i>';
              }
              echo '</a>';
          }
          ?>
      </div>


    </div>
  </div>
</footer>

</body>
</html>
