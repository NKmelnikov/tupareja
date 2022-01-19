<?php
/*
Template Name: Main
*/
get_header();
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::instance()->version();
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
<section id="main-gallery" class="mp1-main-search">

	<div class="mp1-main-search-wrap">
	  <input class="mp1-main-search__input" id="mp1-main-search-input" name="mp1-main-search-input" type="text" placeholder="<?php _e('gallery_search', 'betheme') ?>">
	  <button class="mp1-main-search__btn" id="mp1-main-search-btn"></button>
	</div>

	<div class="mp1-gallery-title">
		<h2><?php _e('gallery_ladies', 'betheme') ?></h2>
		<p><?php _e('gallery_find_your_couple', 'betheme') ?></p>
	</div>

	<div id="accordion">
		<h6><?php _e('gallery_deep_search', 'betheme') ?></h6>
	</div>
</section>

<form id="mp1-ds-form" action="">
  <div class="number-search-wrapper">
    <section class="mp1-ds-age-section">
      <span><?php _e('search_age', 'betheme') ?></span>
      <div class="mp1-ds-form-line">
        <label for="mp1-ds-age-from" class="label-from"><?php _e('search_from', 'betheme') ?></label>
        <input id="mp1-ds-age-from" name="mp1-ds-age-from" value="18" type="text">
      </div>
      <div class="mp1-ds-form-line">
        <label for="mp1-ds-age-to" class="label-to"><?php _e('search_to', 'betheme') ?></label>
        <input id="mp1-ds-age-to" name="mp1-ds-age-to" value="60" type="text">
      </div>
    </section>
    <section class="mp1-ds-height-section">
      <span><?php _e('search_height', 'betheme') ?></span>
      <div class="mp1-ds-form-line">
        <label for="mp1-ds-height-from" class="label-from"><?php _e('search_from', 'betheme') ?></label>
        <input id="mp1-ds-height-from" name="mp1-ds-height-from" value="160" type="text">
      </div>
      <div class="mp1-ds-form-line">
        <label for="mp1-ds-height-to" class="label-to"><?php _e('search_to', 'betheme') ?></label>
        <input id="mp1-ds-height-to" name="mp1-ds-height-to" value="190" type="text">
      </div>
    </section>
    <section class="mp1-ds-weight-section">
      <span><?php _e('search_weight', 'betheme') ?></span>
      <div class="mp1-ds-form-line">
        <label for="mp1-ds-weight-from" class="label-from"><?php _e('search_from', 'betheme') ?></label>
        <input id="mp1-ds-weight-from" name="mp1-ds-weight-from" value="45" type="text">
      </div>
      <div class="mp1-ds-form-line">
        <label for="mp1-ds-weight-to" class="label-to"><?php _e('search_to', 'betheme') ?></label>
        <input id="mp1-ds-weight-to" name="mp1-ds-weight-to" value="70" type="text">
      </div>
    </section>
  </div>
	<section class="mp1-ds-zodiac-section">
		<span><?php _e('search_zodiac', 'betheme') ?></span>
		<div class="mp1-ds-form-line-3">
		<div class="mp1-ds-form-line-2">
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-aquarius"><?php _e('search_zodiac_aquarius', 'betheme') ?></label>
			<input id="mp1-ds-aquarius" class="zodiac-input" name="mp1-ds-aquarius" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-pisces"><?php _e('search_zodiac_pisces', 'betheme') ?></label>
			<input id="mp1-ds-pisces" class="zodiac-input" name="mp1-ds-pisces" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-aries"><?php _e('search_zodiac_aries', 'betheme') ?></label>
			<input id="mp1-ds-aries" class="zodiac-input" name="mp1-ds-aries" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-taurus"><?php _e('search_zodiac_taurus', 'betheme') ?></label>
			<input id="mp1-ds-taurus" class="zodiac-input" name="mp1-ds-taurus" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-gemini"><?php _e('search_zodiac_gemini', 'betheme') ?></label>
			<input id="mp1-ds-gemini" class="zodiac-input" name="mp1-ds-gemini" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-cancer"><?php _e('search_zodiac_cancer', 'betheme') ?></label>
			<input id="mp1-ds-cancer" class="zodiac-input" name="mp1-ds-cancer" type="checkbox">
		</div>
		</div>
		<div class="mp1-ds-form-line-2">
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-leo"><?php _e('search_zodiac_leo', 'betheme') ?></label>
			<input id="mp1-ds-leo" class="zodiac-input" name="mp1-ds-leo" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-virgo"><?php _e('search_zodiac_virgo', 'betheme') ?></label>
			<input id="mp1-ds-virgo" class="zodiac-input" name="mp1-ds-virgo" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-libra"><?php _e('search_zodiac_libra', 'betheme') ?></label>
			<input id="mp1-ds-libra" class="zodiac-input" name="mp1-ds-libra" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-scorpio"><?php _e('search_zodiac_scorpio', 'betheme') ?></label>
			<input id="mp1-ds-scorpio" class="zodiac-input" name="mp1-ds-scorpio" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-sagittarius"><?php _e('search_zodiac_sagittarius', 'betheme') ?></label>
			<input id="mp1-ds-sagittarius" class="zodiac-input" name="mp1-ds-sagittarius" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-capricorn"><?php _e('search_zodiac_capricorn', 'betheme') ?></label>
			<input id="mp1-ds-capricorn" class="zodiac-input" name="mp1-ds-capricorn" type="checkbox">
		</div>
		</div>
		</div>
	</section>
	<section class="mp1-ds-eye-section">
		<span><?php _e('search_eye_color', 'betheme') ?></span>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-eyes-blue"><?php _e('search_eye_blue', 'betheme') ?></label>
			<input id="mp1-ds-eyes-blue" class="eyes-input" name="mp1-ds-eyes-blue" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-eyes-hazel"><?php _e('search_eye_hazel', 'betheme') ?></label>
			<input id="mp1-ds-eyes-hazel" class="eyes-input" name="mp1-ds-eyes-hazel" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-eyes-gray"><?php _e('search_eye_gray', 'betheme') ?></label>
			<input id="mp1-ds-eyes-gray" class="eyes-input" name="mp1-ds-eyes-gray" type="checkbox">
		</div>
		<div class="mp1-ds-form-line">
			<label for="mp1-ds-eyes-green"><?php _e('search_eye_green', 'betheme') ?></label>
			<input id="mp1-ds-eyes-green" class="eyes-input" name="mp1-ds-eyes-green" type="checkbox">
		</div>
    <div class="mp1-ds-form-line">
      <label for="mp1-ds-eyes-black"><?php _e('search_eye_black', 'betheme') ?></label>
      <input id="mp1-ds-eyes-black" class="eyes-input" name="mp1-ds-eyes-black" type="checkbox">
    </div>
	</section>
  <section class="mp1-ds-hair-section">
    <span><?php _e('search_hair_color', 'betheme') ?></span>
    <div class="mp1-ds-form-line">
      <label for="mp1-ds-hair-ginger"><?php _e('search_hair_ginger', 'betheme') ?></label>
      <input id="mp1-ds-hair-ginger" class="hair-input" name="mp1-ds-hair-ginger" type="checkbox">
    </div>
    <div class="mp1-ds-form-line">
      <label for="mp1-ds-hair-brunette"><?php _e('search_hair_brunette', 'betheme') ?></label>
      <input id="mp1-ds-hair-brunette" class="hair-input" name="mp1-ds-hair-brunette" type="checkbox">
    </div>
    <div class="mp1-ds-form-line">
      <label for="mp1-ds-hair-blond"><?php _e('search_hair_blond', 'betheme') ?></label>
      <input id="mp1-ds-hair-blond" class="hair-input" name="mp1-ds-hair-blond" type="checkbox">
    </div>
    <div class="mp1-ds-form-line">
      <label for="mp1-ds-hair-chestnut"><?php _e('search_hair_chestnut', 'betheme') ?></label>
      <input id="mp1-ds-hair-chestnut" class="hair-input" name="mp1-ds-hair-chestnut" type="checkbox">
    </div>
  </section>
  <div class="mp1-ds-btn-container">
    <button id="mp1-ds-submit-btn" type="submit"><?php _e('search_search', 'betheme') ?></button>
    <a id="mp1-reset-search" href="javascript:void(0)"><?php _e('search_reset_search', 'betheme') ?></a>
  </div>
</form>

<div class="mp1-wrapper"></div>
<div class="mp1-lower-section">
  <div id="pagination"></div>
</div>

<script src="<?= $pathToCustom . '_static/js/main-gallery-handler.js?v='.$v ?>"></script>


<!--<section class="mp1-video-block">-->
<!--	<div class="mp1-video-description">-->
<!--		<div class="mp1-video-contact">-->
<!--			<h3>--><?php //_e('video_dear', 'betheme') ?><!--</h3>-->
<!--			<p>--><?php //_e('video_text', 'betheme') ?><!--</p>-->
<!--			<a class="mp1-video-link" href="/contact/"><span>--><?php //_e('video_contacts', 'betheme') ?><!--</span></a>-->
<!--		</div>-->
<!--	</div>-->
<!--	<video loop="" autoplay="" muted="" class="mp1-bg-video" id="mp1-bg-video">-->
<!--		<source src="--><?//= $pathToCustom . '_static/video/hearts-video.mp4?v='.$v ?><!--">-->
<!--	</video>-->
<!--  <p class="click-to-mute">--><?php //_e('click_to_mute', 'betheme') ?><!--</p>-->
<!--</section>-->
<div class="heart-box heart-box-shirts">
  <img class="heart-box__heart-small shirts-section hs8" src="<?= $pathToCustom . '_static/img/small-right.png?v='. $v?>" alt="">
</div>
<!--<section class="mp1-b3-wrap">-->
<!--	<div class="mp1-b3-lady mp1-b3-elem">-->
<!--		<a href="/for-ladies/">--><?php //_e('registration_for_ladies', 'betheme') ?><!--</a>-->
<!--	</div>-->
<!--	<div class="mp1-b3-men mp1-b3-elem">-->
<!--		<a href="/men-application/">--><?php //_e('registration_for_men', 'betheme') ?><!--</a>-->
<!--	</div>-->
<!---->
<!--</section>-->

<div class="heart-box heart-box-advantage">
  <img class="heart-box__heart-medium advantage-section hs9" src="<?= $pathToCustom . '_static/img/medium-right.png?v='. $v?>" alt="">
</div>
<section class="mp1-advantage">
	<div class="mp1-advantage-title-group">
		<h2 class="mp1-advantage-title"><?php _e('advantages_our', 'betheme') ?></h2>
		<p class="mp1-advantage-title2"><?php _e('advantages_find_love', 'betheme') ?></p>
	</div>

	<div class="mp1-advantage-wrap">
		<div class="mp1-advantage-line">
			<div class="mp1-advantage-elem">
				<div class="mp1-advantage-icon"><img src="<?= $pathToCustom . '_static/img/advantage-icon-1.png?v='. $v?>"></div>
				<div class="mp1-advantage-description">
					<h3 class="mp1-advantage-elem-title"><?php _e('advantages_registration', 'betheme') ?></h3>
					<p class="mp1-advantage-elem-delimiter">...</p>
					<p class="mp1-advantage-elem-desc"><?php _e('advantages_registration_text', 'betheme') ?></p>
				</div>
			</div>

			<div class="mp1-advantage-elem">
				<div class="mp1-advantage-icon"><img src="<?= $pathToCustom . '_static/img/advantage-icon-2.png?v='. $v?>"></div>
				<div class="mp1-advantage-description">
					<h3 class="mp1-advantage-elem-title"><?php _e('advantages_individual', 'betheme') ?></h3>
					<p class="mp1-advantage-elem-delimiter">...</p>
					<p class="mp1-advantage-elem-desc"><?php _e('advantages_individual_text', 'betheme') ?></p>
				</div>
			</div>

			<div class="mp1-advantage-elem">
				<div class="mp1-advantage-icon"><img src="<?= $pathToCustom . '_static/img/advantage-icon-3.png?v='. $v?>"></div>
				<div class="mp1-advantage-description">
					<h3 class="mp1-advantage-elem-title"><?php _e('advantages_confidential', 'betheme') ?></h3>
					<p class="mp1-advantage-elem-delimiter">...</p>
					<p class="mp1-advantage-elem-desc"><?php _e('advantages_confidential_text', 'betheme') ?></p>
				</div>
			</div>

		</div>

		<div class="mp1-advantage-line">
			<div class="mp1-advantage-elem">
				<div class="mp1-advantage-icon"><img src="<?= $pathToCustom . '_static/img/advantage-icon-4.png?v='. $v?>"></div>
				<div class="mp1-advantage-description">
					<h3 class="mp1-advantage-elem-title"><?php _e('advantages_exp', 'betheme') ?></h3>
					<p class="mp1-advantage-elem-delimiter">...</p>
					<p class="mp1-advantage-elem-desc"><?php _e('advantages_exp_text', 'betheme') ?></p>
				</div>
			</div>

			<div class="mp1-advantage-elem">
				<div class="mp1-advantage-icon"><img src="<?= $pathToCustom . '_static/img/advantage-icon-5.png?v='. $v?>"></div>
				<div class="mp1-advantage-description">
					<h3 class="mp1-advantage-elem-title"><?php _e('advantages_guaranty', 'betheme') ?></h3>
					<p class="mp1-advantage-elem-delimiter">...</p>
					<p class="mp1-advantage-elem-desc"><?php _e('advantages_guaranty_text', 'betheme') ?></p>
				</div>
			</div>


		</div>

		<div class="mp1-advantage-line">
			<div class="mp1-advantage-elem">
				<div class="mp1-advantage-icon"><img src="<?= $pathToCustom . '_static/img/advantage-icon-6.png?v='. $v?>"></div>
				<div class="mp1-advantage-description">
					<h3 class="mp1-advantage-elem-title"><?php _e('advantages_effective', 'betheme') ?></h3>
					<p class="mp1-advantage-elem-delimiter">...</p>
					<p class="mp1-advantage-elem-desc"><?php _e('advantages_effective_text', 'betheme') ?></p>
				</div>
			</div>


		</div>
	</div>

</section>
<?php
get_footer();
?>
