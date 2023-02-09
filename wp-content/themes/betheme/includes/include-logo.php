<?php
$pathToCustom = '/wp-content/themes/betheme/_Custom/';
$pathToLogo = (get_locale() === 'ru_RU')
	? $pathToCustom . '_static/img/logo_small_ru.png'
	: $pathToCustom . '_static/img/logo_small_en.png';
$ruSuffix = (get_locale() === 'ru_RU') ? '/ru' : '';

echo '<div class="logo">
		<a id="logo" href="' . esc_url(get_home_url()) . $ruSuffix . '">
		<img class="main-logo" src="' . $pathToLogo . '"  alt=""/>
</a>';

echo '</div>';
