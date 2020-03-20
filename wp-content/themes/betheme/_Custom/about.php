<?php
/*
Template Name: About
*/
get_header();
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::instance()->version();
$pathToCustom = '/wp-content/themes/betheme/_Custom/';

?>
<link rel="stylesheet" href="<?= $pathToCustom .'_static/scss/about/about.css?v='.$v ?>">
<script src="<?= $pathToCustom . '_static/libs/pagination.min.js'?>"></script>
<script src="<?= $pathToCustom . '_static/libs/jquery-ui.min.js'?>"></script>
<section class="paralax-box">
	<div class="paralax-box__image"></div>
	<div class="paralax-box__border"></div>
</section>

<section class="about-wrapper-title">
	<div class="about-title">
		<h2><?php _e('about', 'betheme') ?></h2>
	</div>
</section>
<section class="about">
	<div class="about_line line_1">
		<div class="left">
			<img src="<?= $pathToCustom . '_static/img/about_img_1.png'?>">
		</div>
		<div class="right">
			<p>Меня зовут Лена, я родилась в Украине, городе-герое Киеве.<br/>Хочу поделиться с вами своим собственным опытом.<br/>Моя история началась в далеком 2007 году, когда разочаровавшись в поисках своего мужчины в Украине, я решила попытать свое счастье на чужбине, среди иностранных мужчин, и мой выбор упал на теплую Испанию, поскольку у меня было преимущество, и я знала испанский язык, факультет испанской филологии мне в этом помог, я начала свои поиски.</p>
		</div>
	</div>
	<div class="about_line line_2">
		<div class="right">
			<img src="<?= $pathToCustom . '_static/img/about_img_2.png'?>">
		</div>
		<div class="left">
			<p>Если быть откровенной, я три года переписывалась с мужчинами в разных мессенджерах, но так и не получалось найти своего единственного, сильного и надежного. Но внутри себя, я все равно знала, что рано или поздно я все равно найду его. Конечно, если бы тогда мне смогли помочь в моих долгих поисках в огромной сети интернет, я бы не потеряла свое драгоценное время на пустую переписку несерьезных кандидатов. Ты же не знаешь, кто на самом деле находится по ту сторону экрана, его реальные намерения, цели и т.д. Но в одно прекрасное утро, я получила сообщение из Барселоны от моего будущего мужа (тогда я была еще далека от этой мысли) и что самое удивительное, он приехал знакомиться со мной в Украину, через две недели нашей переписки.</p>
		</div>
	</div>

	<div class="about_line line_1">
		<div class="left">
			<img src="<?= $pathToCustom . '_static/img/about_img_3.png'?>">
		</div>
		<div class="right">
			<p>Мы много гуляли по городу Киеву, много разговаривали, наши цели и намерения были одинаковые. Мы оба хотели создать семейное уютное гнездышко, построить доверительные крепкие отношения, ведь для каждого из нас это главная цель. Меня абсолютно не пугал менталитет другой страны, мне это стало даже интересным, создать межнациональную семью, где могу внести особенности нашей украинской богатой культуры, а также разделять другие культурные особенности теплой Испании. Через два года наших отношений мы решили пожениться, этот день был самым счастливым в нашей жизни.</p>
		</div>
	</div>
	<div class="about_line line_2">
		<div class="right">
			<img src="<?= $pathToCustom . '_static/img/about_img_4.png'?>">
		</div>
		<div class="left">
			<p>Сейчас мы воспитываем двоих деток, я должны была выучить каталонский язык и интегрироваться в новое для меня общество и окружение, но какая у меня мотивация – это моя любовь, во имя любви мы способны на многое.

				Кто он испанский мужчина, кто она украинская девушка, какое сходство и отличие, давайте разберемся подробнее (ссылка)

				Дорогие девушки, наша основная цель – предоставить вам уникальную возможность познакомиться с испанскими надежными мужчинам, а испанским мужчинам найти свою музу среди украинских красавиц, которые ищут именно вас и чтобы вы смогли построить добрые, крепкие, стабильные и доверительные отношения, а все остальное зависит от вас.</p>
		</div>
	</div>
</section>
<section class="guarant">
	<div class="guarant_border">
		<div class="guarant_title_wrap">
			<h2>Service Guarantee</h2>
			<p>Best service</p>
		</div>
		<div class="guarant_elem_wrap">
			<div class="guarant_elem"><p class="top">5</p><p class="bottom">Лет на рынке</p></div>
			<div class="guarant_elem"><p class="top">75</p><p class="bottom">Соеденено сердец</p></div>
			<div class="guarant_elem"><p class="top">375</p><p class="bottom">Невест на сайте</p></div>
			<div class="guarant_elem"><p class="top">523</p><p class="bottom">Мужчины в поиске</p></div>
		</div>
	</div>
</section>

<section class="about-b3-wrap">
	<div class="about-b3-lady about-b3-elem">
		<a href="/for-ladies/"><?php _e('registration_for_ladies', 'betheme') ?></a>
	</div>
	<div class="about-b3-men about-b3-elem">
		<a href="/men-application/"><?php _e('registration_for_men', 'betheme') ?></a>
	</div>

</section>



<div class="heart-box heart-box-shirts">
  <img class="heart-box__heart-medium shirts-section hs6" src="<?= $pathToCustom . '_static/img/medium-left.png?v='. $v?>" alt="">
  <img class="heart-box__heart-big shirts-section hs7" src="<?= $pathToCustom . '_static/img/big-left.png?v='. $v?>" alt="">
  <img class="heart-box__heart-small shirts-section hs8" src="<?= $pathToCustom . '_static/img/small-right.png?v='. $v?>" alt="">
</div>

<div class="heart-box heart-box-advantage">
  <img class="heart-box__heart-medium advantage-section hs9" src="<?= $pathToCustom . '_static/img/medium-right.png?v='. $v?>" alt="">
</div>
<?php
get_footer();
?>
