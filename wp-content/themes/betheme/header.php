<?php
/**
 * The Header for our theme.
 *
 * @package Betheme
 * @author Muffin group
 * @link https://muffingroup.com
 */
use Helper\CustomHelper;
?><!DOCTYPE html>
<?php
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$customHelper = new CustomHelper();
$customHelper::build();
	if ($_GET && key_exists('mfn-rtl', $_GET)):
		echo '<html class="no-js" lang="ar" dir="rtl">';
	else:

  $languageClass = '';
	switch (get_locale()) {
      case 'ru_RU':
          $languageClass = 'ru';
          break;
      default:
          $languageClass = 'es';
          break;
  }
?>
<html <?php language_attributes(); ?> class="noselect no-js<?php echo esc_attr(mfn_user_os()); ?> <?= $languageClass ?>"<?php mfn_tag_schema(); ?>>
<?php endif; ?>

<script src="//code.jivosite.com/widget/VBPfmCG0sM" async></script>
<head>
<!--  <script language="JavaScript">-->
<!--      document.oncontextmenu =new Function("return false;")-->
<!--  </script>-->
    
<?php if($customHelper::instance()->env() === 'prod') : ?>
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
	  (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
		  m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	  (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

	  ym(66732919, "init", {
		  clickmap:true,
		  trackLinks:true,
		  accurateTrackBounce:true,
		  webvisor:true
	  });
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/66732919" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
<?php endif; ?>


<?php wp_head(); ?>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="keywords" content="tu, pareja, ucraniana">
  <meta name="author" content="https://melnikovshop.online">
  <meta property="og:title" content="Tu Pareja Ucraniana">
  <meta property="og:description" content="Tu Pareja Ucraniana. Encuentra tu amor.">
  <meta property="og:image" content="/wp-content/themes/betheme/_Custom/_static/img/tupareja-logo-es.png">
  <meta property="og:url" content="https://tuparejaucraniana.com/">

  <meta property="twitter:card" content="/wp-content/themes/betheme/_Custom/_static/img/tupareja-logo-es.png">
  <meta property="twitter:url" content="https://tuparejaucraniana.com/">
  <meta property="twitter:title" content="Tu Pareja Ucraniana">
  <meta property="twitter:description" content="Tu Pareja Ucraniana. Encuentra tu amor.">
  <meta property="twitter:image" content="/wp-content/themes/betheme/_Custom/_static/img/tupareja-logo-es.png">

	<link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/scss/main/header.css?v=<?= time() ?>">
</head>

<body onselectstart="return false" <?php body_class(); ?>>

	<?php do_action('mfn_hook_top'); ?>

	<?php get_template_part('includes/header', 'sliding-area'); ?>

	<?php
		if (mfn_header_style(true) == 'header-creative') {
			get_template_part('includes/header', 'creative');
		}
	?>

	<div id="Wrapper">

		<?php

			// featured image: parallax

			$class = '';
			$data_parallax = array();

			if (mfn_opts_get('img-subheader-attachment') == 'parallax') {
				$class = 'bg-parallax';

				if (mfn_opts_get('parallax') == 'stellar') {
					$data_parallax['key'] = 'data-stellar-background-ratio';
					$data_parallax['value'] = '0.5';
				} else {
					$data_parallax['key'] = 'data-enllax-ratio';
					$data_parallax['value'] = '0.3';
				}
			}
		?>

		<?php
			if (mfn_header_style(true) == 'header-below') {
				echo mfn_slider();
			}
		?>

		<div id="Header_wrapper" class="<?php echo esc_attr($class); ?>" <?php if ($data_parallax) {
			printf('%s="%.1f"', $data_parallax['key'], $data_parallax['value']);
		} ?>>

			<?php
				if ('mhb' == mfn_header_style()) {

					// mfn_header action for header builder plugin

					do_action('mfn_header');
					echo mfn_slider();

				} else {

					echo '<header id="Header">';
						if (mfn_header_style(true) != 'header-creative') {
							get_template_part('includes/header', 'top-area');
						}
						if (mfn_header_style(true) != 'header-below') {
							echo mfn_slider();
						}
					echo '</header>';

				}
			?>

			<?php
				if ((mfn_opts_get('subheader') != 'all') &&
					(! get_post_meta(mfn_ID(), 'mfn-post-hide-title', true)) &&
					(get_post_meta(mfn_ID(), 'mfn-post-template', true) != 'intro')) {

					$subheader_advanced = mfn_opts_get('subheader-advanced');

					if (is_search()) {

						echo '<div id="Subheader">';
							echo '<div class="container">';
								echo '<div class="column one">';

									if (trim($_GET['s'])) {
										global $wp_query;
										$total_results = $wp_query->found_posts;
									} else {
										$total_results = 0;
									}

									$translate['search-results'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-results', 'results found for:') : __('results found for:', 'betheme');
									echo '<h1 class="title">'. esc_html($total_results) .' '. esc_html($translate['search-results']) .' '. esc_html($_GET['s']) .'</h1>';

								echo '</div>';
							echo '</div>';
						echo '</div>';

					} elseif (! mfn_slider_isset() || (is_array($subheader_advanced) && isset($subheader_advanced['slider-show']))) {

						// subheader

						$subheader_options = mfn_opts_get('subheader');

						if (is_home() && ! get_option('page_for_posts') && ! mfn_opts_get('blog-page')) {
							$subheader_show = false;
						} elseif (is_array($subheader_options) && isset($subheader_options[ 'hide-subheader' ])) {
							$subheader_show = false;
						} elseif (get_post_meta(mfn_ID(), 'mfn-post-hide-title', true)) {
							$subheader_show = false;
						} else {
							$subheader_show = true;
						}

						// title

						if (is_array($subheader_options) && isset($subheader_options[ 'hide-title' ])) {
							$title_show = false;
						} else {
							$title_show = true;
						}

						// breadcrumbs

						if (is_array($subheader_options) && isset($subheader_options[ 'hide-breadcrumbs' ])) {
							$breadcrumbs_show = false;
						} else {
							$breadcrumbs_show = true;
						}

						if (is_array($subheader_advanced) && isset($subheader_advanced[ 'breadcrumbs-link' ])) {
							$breadcrumbs_link = 'has-link';
						} else {
							$breadcrumbs_link = 'no-link';
						}

						// output

						if ($subheader_show) {

							echo '<div id="Subheader">';
								echo '<div class="container">';
									echo '<div class="column one">';

										if ($title_show) {
											$title_tag = mfn_opts_get('subheader-title-tag', 'h1');
											echo '<'. esc_attr($title_tag) .' class="title">'. wp_kses(mfn_page_title(), mfn_allowed_html()) .'</'. esc_attr($title_tag) .'>';
										}

										if ($breadcrumbs_show) {
											mfn_breadcrumbs($breadcrumbs_link);
										}

									echo '</div>';
								echo '</div>';
							echo '</div>';

						}
					}
				}
			?>

		</div>

		<?php
			if (get_post_meta(mfn_ID(), 'mfn-post-template', true) == 'intro') {
				get_template_part('includes/header', 'single-intro');
			}
		?>

		<?php do_action('mfn_hook_content_before');
