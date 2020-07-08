<?php
$pathToCustom = '/wp-content/themes/betheme/_Custom/';
$pathToLogo = (get_locale() === 'ru_RU') ? $pathToCustom . '_static/img/tupareja-logo-ua.png' : $pathToCustom . '_static/img/tupareja-logo-es.png';
$ruSuffix = (get_locale() === 'ru_RU') ? '/ru' : '';

echo '<div class="logo">
		<a id="logo" href="' . esc_url(get_home_url()) . $ruSuffix . '">
		<img class="main-logo" src="'.$pathToLogo.'"  alt=""/>
</a>';

echo '</div>';
