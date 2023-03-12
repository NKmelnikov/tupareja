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
<!--<section class="paralax-box">-->
<!--	<div class="paralax-box__image"></div>-->
<!--	<div class="paralax-box__border"></div>-->
<!--</section>-->

<!--<div class="heart-box heart-box-search-top">-->
<!--	<img class="heart-box__heart-big search-top-section hs19" src="--><?//= $pathToCustom . '_static/img/big-right.png?v='.$v ?><!--" alt="">-->
<!--	<img class="heart-box__heart-medium search-top-section hs5" src="--><?//= $pathToCustom . '_static/img/medium-right.png?v='.$v ?><!--" alt="">-->
<!--	<img class="heart-box__heart-medium search-top-section hs4" src="--><?//= $pathToCustom . '_static/img/medium-left.png?v='.$v ?><!--" alt="">-->
<!--</div>-->

<section class="about-wrapper-title">
	<div class="about-title">
		<h2><?php _e('about_title', 'betheme') ?></h2>
	</div>
</section>
<section class="about">
	<div class="about_line line_1">
		<div class="left">
			<img src="<?= $pathToCustom . '_static/img/about_img_1.jpg'?>" style="width: 590px">
		</div>
		<div class="right">
			<p><?php _e('about_elem_1', 'betheme') ?></p>
		</div>
	</div>
	<div class="about_line line_2">
		<div class="right">
			<img src="<?= $pathToCustom . '_static/img/about_img_2.jpg'?>" style="width: 590px">
		</div>
		<div class="left">
			<p><?php _e('about_elem_2', 'betheme') ?></p>
		</div>
	</div>

	<div class="about_line line_1">
		<div class="left">
			<img src="<?= $pathToCustom . '_static/img/about_img_3.jpg'?>" style="width: 590px">
		</div>
		<div class="right">
			<p><?php _e('about_elem_3', 'betheme') ?></p>
		</div>
	</div>
	<div class="about_line line_2">
		<div class="right">
			<img src="<?= $pathToCustom . '_static/img/about_img_4.jpg'?>" style="width: 590px">
		</div>
		<div class="left">
			<p><?php _e('about_elem_4', 'betheme') ?></p>
		</div>
	</div>
</section>
<section class="guarant">
	<div class="guarant_border">
		<div class="guarant_title_wrap">
			<h2><?php _e('guarant_title', 'betheme') ?></h2>
			<p><?php _e('guarant_title_text', 'betheme') ?></p>
		</div>
		<div class="guarant_elem_wrap">
			<div class="guarant_elem"><p class="top">5</p><p class="bottom"><?php _e('guarant_elem_1', 'betheme') ?></p></div>
			<div class="guarant_elem"><p class="top">75</p><p class="bottom"><?php _e('guarant_elem_2', 'betheme') ?></p></div>
			<div class="guarant_elem"><p class="top">375</p><p class="bottom"><?php _e('guarant_elem_3', 'betheme') ?></p></div>
			<div class="guarant_elem"><p class="top">523</p><p class="bottom"><?php _e('guarant_elem_4', 'betheme') ?></p></div>
		</div>
	</div>
</section>
<div class="heart-box heart-box-shirts no-mobile">
	<img class="heart-box__heart-medium shirts-section hs6" src="<?= $pathToCustom . '_static/img/medium-left.png?v='. $v?>" alt="">
	<img class="heart-box__heart-big shirts-section hs7" src="<?= $pathToCustom . '_static/img/big-left.png?v='. $v?>" alt="">
	<img class="heart-box__heart-small shirts-section hs8" src="<?= $pathToCustom . '_static/img/small-right.png?v='. $v?>" alt="">
</div>
<!--<section class="about-b3-wrap">-->
<!--	<div class="about-b3-lady about-b3-elem">-->
<!--		<a href="/for-ladies/">--><?php //_e('registration_for_ladies', 'betheme') ?><!--</a>-->
<!--	</div>-->
<!--	<div class="about-b3-men about-b3-elem">-->
<!--		<a href="/men-application/">--><?php //_e('registration_for_men', 'betheme') ?><!--</a>-->
<!--	</div>-->
<!---->
<!--</section>-->






<?php
get_footer();
?>
