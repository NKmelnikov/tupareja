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

						mfn_wp_nav_menu();

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
