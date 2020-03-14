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
                <li id="menu-item-87" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-82 current_page_item">
                  <a href="http://melnikovshop.loc/"><span>Главная</span></a>
                </li>
                <li id="menu-item-86" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://melnikovshop.loc/our-ladies/"><span>Галерея девушек</span></a>
                </li>
                <li id="menu-item-107" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://melnikovshop.loc/service/"><span>Услуги</span></a>
                </li>
                <li id="menu-item-138" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://melnikovshop.loc/tips-tricks/"><span>Советы и рекомендации</span></a>
                </li>
                <li id="menu-item-139" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://melnikovshop.loc/for-ladies/"><span>Для девушек</span></a>
                </li>
                <li id="menu-item-140" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://melnikovshop.loc/men-application/"><span>Заявка для мужчин</span></a>
                </li>
                <li id="menu-item-141" class="menu-item menu-item-type-post_type menu-item-object-page">
                  <a href="http://melnikovshop.loc/contact/"><span>Контакты</span></a>
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
