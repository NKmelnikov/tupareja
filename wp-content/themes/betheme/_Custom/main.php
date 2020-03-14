<?php
/*
Template Name: Main
*/
get_header();
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::version();
$pathToCustom = '/wp-content/themes/betheme/_Custom/';

?>
<link rel="stylesheet" href="<?= $pathToCustom .'_static/scss/main/main.css?v='.$v ?>">
<script src="<?= $pathToCustom . '_static/libs/pagination.min.js'?>"></script>
<script src="<?= $pathToCustom . '_static/libs/jquery-ui.min.js'?>"></script>

<!--<h2>Галерея девушек</h2>-->
<div class="heart-box heart-box-search-top">
  <img class="heart-box__heart-big search-top-section hs3" src="<?= $pathToCustom . '_static/img/big-right.png?v='.$v ?>" alt="">
  <img class="heart-box__heart-medium search-top-section hs5" src="<?= $pathToCustom . '_static/img/medium-right.png?v='.$v ?>" alt="">
  <img class="heart-box__heart-medium search-top-section hs4" src="<?= $pathToCustom . '_static/img/medium-left.png?v='.$v ?>" alt="">
</div>
<section class="mp1-main-search">

	<div class="mp1-main-search-wrap">
	  <label for="mp1-main-search-input">Поиск</label>
	  <input class="mp1-main-search__input" id="mp1-main-search-input" name="mp1-main-search-input" type="text">
	  <button class="mp1-main-search__btn" id="mp1-main-search-btn"></button>
	</div>

	<div class="mp1-gallery-title">
		<h2><?php __('Галерея девушек', 'betheme') ?></h2>
		<p>Найди свою вторую половину</p>
	</div>

	<div id="accordion">
		<h6>Расширенный поиск</h6>
	</div>
</section>

<form id="mp1-ds-form" action="">
	<section class="mp1-ds-age-section">
		<span>Возраст</span>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-age-from">От</label>
			<input id="mp1-ds-age-from" name="mp1-ds-age-from" value="18" type="text">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-age-to">До</label>
			<input for="mp1-ds-age-to" name="mp1-ds-age-to" value="60" type="text">
		</div>
	</section>
	<section class="mp1-ds-height-section">
		<span>Рост</span>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-height-from">От</label>
			<input id="mp1-ds-height-from" name="mp1-ds-height-from" value="160" type="text">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-height-to">До</label>
			<input for="mp1-ds-height-to" name="mp1-ds-height-to" value="190" type="text">
		</div>
	</section>
	<section class="mp1-ds-weight-section">
		<span>Вес</span>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-weight-from">От</label>
			<input id="mp1-ds-weight-from" name="mp1-ds-weight-from" value="45" type="text">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-weight-to">До</label>
			<input for="mp1-ds-weight-to" name="mp1-ds-weight-to" value="70" type="text">
		</div>
	</section>
	<section class="mp1-ds-zodiac-section">
		<span>Знак зодиака</span>
		<div class="mp1-ds-form-line-3">
		<div class="mp1-ds-form-line-2">
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-aquarius">Водолей</label>
			<input id="mp1-ds-aquarius" class="zodiac-input" name="mp1-ds-aquarius" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-pisces">Рыбы</label>
			<input id="mp1-ds-pisces" class="zodiac-input" name="mp1-ds-pisces" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-aries">Овен</label>
			<input id="mp1-ds-aries" class="zodiac-input" name="mp1-ds-aries" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-taurus">Телец</label>
			<input id="mp1-ds-taurus" class="zodiac-input" name="mp1-ds-taurus" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-gemini">Близнецы</label>
			<input id="mp1-ds-gemini" class="zodiac-input" name="mp1-ds-gemini" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-cancer">Рак</label>
			<input id="mp1-ds-cancer" class="zodiac-input" name="mp1-ds-cancer" type="checkbox">
		</div>
		</div>
		<div class="mp1-ds-form-line-2">
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-leo">Лев</label>
			<input id="mp1-ds-leo" class="zodiac-input" name="mp1-ds-leo" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-virgo">Дева</label>
			<input id="mp1-ds-virgo" class="zodiac-input" name="mp1-ds-virgo" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-libra">Весы</label>
			<input id="mp1-ds-libra" class="zodiac-input" name="mp1-ds-libra" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-scorpio">Скорпион</label>
			<input id="mp1-ds-scorpio" class="zodiac-input" name="mp1-ds-scorpio" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-sagittarius">Стрелец</label>
			<input id="mp1-ds-sagittarius" class="zodiac-input" name="mp1-ds-sagittarius" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-capricorn">Козерог</label>
			<input id="mp1-ds-capricorn" class="zodiac-input" name="mp1-ds-capricorn" type="checkbox">
		</div>
		</div>
		</div>
	</section>
	<section class="mp1-ds-eye-section">
		<span>Цвет глаз</span>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-eyes-blue">Голубые</label>
			<input id="mp1-ds-eyes-blue" class="eyes-input" name="mp1-ds-eyes-blue" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-eyes-hazel">Карьи</label>
			<input id="mp1-ds-eyes-hazel" class="eyes-input" name="mp1-ds-eyes-hazel" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-eyes-gray">Серые</label>
			<input id="mp1-ds-eyes-gray" class="eyes-input" name="mp1-ds-eyes-gray" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-eyes-green">Зелёные</label>
			<input id="mp1-ds-eyes-green" class="eyes-input" name="mp1-ds-eyes-green" type="checkbox">
		</div>
	</section>
	<button id="mp1-ds-submit-btn" type="submit">Искать</button>
</form>

<div class="mp1-wrapper"></div>
<div class="mp1-lower-section">
  <div id="pagination"></div>

</div>

<script src="<?= $pathToCustom . '_static/js/main-gallery-handler.js?v='.$v ?>"></script>


<section class="mp1-video-block">
	<div class="mp1-video-description">
		<div class="mp1-video-contact">
			<h3>Дорогие девушки</h3>
			<p>Наша основная цель – подарить вам уникальную возможность познакомиться с испанскими надежными мужчинами, а испанским мужчинам найти свою музу среди украинских красавиц, которые ищут  именно вас и чтобы вы смогли построить добрые, крепкие, стабильные и доверительные отношения, а все остальное зависит от вас.</p>
			<a class="mp1-video-link" href="/contact/"><span>Наши контакты</span></a>
		</div>
	</div>
	<video loop="" autoplay="" muted="" class="mp1-bg-video" id="mp1-bg-video">
		<source src="<?= $pathToCustom . '_static/video/hearts-video.mp4?v='.$v ?>">
	</video>
  <p class="click-to-mute">click on screen <br> to mute\unmute</p>
</section>
<div class="heart-box heart-box-shirts">
  <img class="heart-box__heart-medium shirts-section hs6" src="<?= $pathToCustom . '_static/img/medium-left.png?v='. $v?>" alt="">
  <img class="heart-box__heart-big shirts-section hs7" src="<?= $pathToCustom . '_static/img/big-left.png?v='. $v?>" alt="">
  <img class="heart-box__heart-small shirts-section hs8" src="<?= $pathToCustom . '_static/img/small-right.png?v='. $v?>" alt="">
</div>
<section class="mp1-b3-wrap">
	<div class="mp1-b3-lady mp1-b3-elem">
		<a href="/for-ladies/">Регистрация для девушек</a>
	</div>
	<div class="mp1-b3-men mp1-b3-elem">
		<a href="/men-application/">Регистрация для мужчин</a>
	</div>

</section>

<div class="heart-box heart-box-advantage">
  <img class="heart-box__heart-medium advantage-section hs9" src="<?= $pathToCustom . '_static/img/medium-right.png?v='. $v?>" alt="">
</div>
<section class="mp1-advantage">
	<div class="mp1-advantage-title-group">
		<h2 class="mp1-advantage-title">Our advantages</h2>
		<p class="mp1-advantage-title2">Find love</p>
	</div>

	<div class="mp1-advantage-wrap">
		<div class="mp1-advantage-line">
			<div class="mp1-advantage-elem">
				<div class="mp1-advantage-icon"><img src="<?= $pathToCustom . '_static/img/advantage-icon-1.png?v='. $v?>"></div>
				<div class="mp1-advantage-description">
					<h3 class="mp1-advantage-elem-title">РЕГИСТРАЦИЯ</h3>
					<p class="mp1-advantage-elem-delimiter">...</p>
					<p class="mp1-advantage-elem-desc">Регистрация в агентстве
						500 грн.</p>
				</div>
			</div>

			<div class="mp1-advantage-elem">
				<div class="mp1-advantage-icon"><img src="<?= $pathToCustom . '_static/img/advantage-icon-2.png?v='. $v?>"></div>
				<div class="mp1-advantage-description">
					<h3 class="mp1-advantage-elem-title">ИНДИВИДУАЛЬНО</h3>
					<p class="mp1-advantage-elem-delimiter">...</p>
					<p class="mp1-advantage-elem-desc">С помощью психолога подбираем идеальных для Вас мужчин</p>
				</div>
			</div>

			<div class="mp1-advantage-elem">
				<div class="mp1-advantage-icon"><img src="<?= $pathToCustom . '_static/img/advantage-icon-3.png?v='. $v?>"></div>
				<div class="mp1-advantage-description">
					<h3 class="mp1-advantage-elem-title">КОНФИДЕНЦИАЛЬНО</h3>
					<p class="mp1-advantage-elem-delimiter">...</p>
					<p class="mp1-advantage-elem-desc">Доступ к вашей анкете закрыт – ее могут увидеть только отобранные для Вас мужчины</p>
				</div>
			</div>

		</div>

		<div class="mp1-advantage-line">
			<div class="mp1-advantage-elem">
				<div class="mp1-advantage-icon"><img src="<?= $pathToCustom . '_static/img/advantage-icon-4.png?v='. $v?>"></div>
				<div class="mp1-advantage-description">
					<h3 class="mp1-advantage-elem-title">ОПЫТ</h3>
					<p class="mp1-advantage-elem-delimiter">...</p>
					<p class="mp1-advantage-elem-desc">Наше брачное агентство создает счастливые семьи с 2001 года, и мы точно знаем, как это делается</p>
				</div>
			</div>

			<div class="mp1-advantage-elem">
				<div class="mp1-advantage-icon"><img src="<?= $pathToCustom . '_static/img/advantage-icon-5.png?v='. $v?>"></div>
				<div class="mp1-advantage-description">
					<h3 class="mp1-advantage-elem-title">ГАРАНТИРОВАННО</h3>
					<p class="mp1-advantage-elem-delimiter">...</p>
					<p class="mp1-advantage-elem-desc">Мы сотрудничаем до тех пор, пока Вы выйдете замуж, и делаем для этого все возможное</p>
				</div>
			</div>


		</div>

		<div class="mp1-advantage-line">
			<div class="mp1-advantage-elem">
				<div class="mp1-advantage-icon"><img src="<?= $pathToCustom . '_static/img/advantage-icon-6.png?v='. $v?>"></div>
				<div class="mp1-advantage-description">
					<h3 class="mp1-advantage-elem-title">ЭФФЕКТИВНО</h3>
					<p class="mp1-advantage-elem-delimiter">...</p>
					<p class="mp1-advantage-elem-desc">Быстро организовываем свидания - это единственный способ сформировать отношение к мужчине</p>
				</div>
			</div>


		</div>
	</div>

</section>
<?php
get_footer();
?>
