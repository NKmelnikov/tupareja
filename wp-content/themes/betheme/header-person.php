<?php
require_once '_Custom/Repository/ClientRepository.php';
use Repository\ClientRepository;
const TABLE_LADIES = 'wp_ladies';

$clientRepository = new ClientRepository();



if(isset($_GET['id'])&& $_GET['id']!="")
{
	$person = $clientRepository->getById(TABLE_LADIES,$_GET['id']);
	if (!isset($person[0])) unset($person); elseif ($person[0]->activated==0) unset($person);
}

if(!isset($_GET['id'])||!isset($person)){
	header('Location: /404');
}
?><!DOCTYPE html>
<?php
if ($_GET && key_exists('mfn-rtl', $_GET)):
	echo '<html class="no-js" lang="ar" dir="rtl">';
else:
?>
<html <?php language_attributes(); ?> class="no-js<?php echo esc_attr(mfn_user_os()); ?>"<?php mfn_tag_schema(); ?>>
<?php endif; ?>

<head>
	<title><?php echo $person[0]->name; ?></title>
<meta charset="<?php bloginfo('charset'); ?>" />
<?php wp_head(); ?>
	<link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/scss/main/header.css?v=<?= time() ?>">
	<link href="/wp-content/themes/betheme/_Custom/_static/libs/lightbox/css/lightbox.css?v=<?= time() ?>" rel="stylesheet" />
	<script src="/wp-content/themes/betheme/_Custom/_static/libs/lightbox/js/lightbox.js?v=<?= time() ?>"></script>
</head>

<body <?php body_class(); ?>>

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
											echo '<'. esc_attr($title_tag) .' class="title">'. $person[0]->name .'</'. esc_attr($title_tag) .'>';
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
