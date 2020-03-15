<div class="heart-box heart-box-main-header">
  <img class="heart-box__heart-small footer-section hs10" src="/wp-content/themes/betheme/_Custom/_static/img/small-left.png" alt="">
  <img class="heart-box__heart-medium footer-section hs11" src="/wp-content/themes/betheme/_Custom/_static/img/medium-right.png" alt="">
</div>
<footer id="Footer" class="clearfix">
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
            <nav id="menu-bot">
              <ul id="menu-menu-2" class="menu menu-main">
                <li id="menu-item-22" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-82 current_page_item">
                  <a href="http://melnikovshop.loc/es/"><span><?php _e('header_main', 'betheme') ?></span></a>
                </li>
                <li id="menu-item-33" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://melnikovshop.loc/es/our-ladies/"><span><?php _e('header_about_us', 'betheme') ?></span></a>
                </li>
                <li id="menu-item-44" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://melnikovshop.loc/es/service/"><span><?php _e('header_service', 'betheme') ?></span></a>
                </li>
                  <?php if (get_locale() === 'ru_RU'): ?>
                    <li id="menu-item-137" class="menu-item menu-item-type-post_type menu-item-object-page">
                      <a href="http://melnikovshop.loc/es/tips-tricks/"><span><?php _e('header_lady_tips', 'betheme') ?></span></a>
                    </li>
                  <?php else: ?>
                    <li id="menu-item-55" class="menu-item menu-item-type-post_type menu-item-object-page">
                      <a href="http://melnikovshop.loc/es/tips-tricks/"><span><?php _e('header_man_tips', 'betheme') ?></span></a>
                    </li>
                  <?php endif; ?>
                <li id="menu-item-66" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://melnikovshop.loc/es/for-ladies/"><span><?php _e('header_lady_application', 'betheme') ?></span></a>
                </li>
                <li id="menu-item-77" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://melnikovshop.loc/es/men-application/"><span><?php _e('header_man_application', 'betheme') ?></span></a>
                </li>
                <li id="menu-item-88" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://melnikovshop.loc/es/contact/"><span><?php _e('header_contacts', 'betheme') ?></span></a>
                </li>
              </ul>
            </nav>
          <?php

						// responsive menu button

						$mb_class = '';
						if (mfn_opts_get('header-menu-mobile-sticky')) {
							$mb_class .= ' is-sticky';
						}

						echo '<a class="responsive-menu-toggle '. esc_attr($mb_class) .'" href="#">';
						if ($menu_text = trim(mfn_opts_get('header-menu-text'))) {
							echo '<span>'. wp_kses($menu_text, mfn_allowed_html()) .'</span>';
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
