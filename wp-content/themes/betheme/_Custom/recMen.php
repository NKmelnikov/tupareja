<?php
/*
Template Name: Recommendations Men
*/
get_header();
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::instance()->version();
$pathToCustom = '/wp-content/themes/betheme/_Custom/';
?>

<link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/service/service.css?v=' . $v ?>">

<main class="rm1-wrapper">
  <section class="paralax-box">
    <div class="paralax-box__image"></div>
    <div class="paralax-box__border"></div>
  </section>
  <div class="heart-box heart-box-advantage">
    <img class="heart-box__heart-medium service-section hs12" src="<?= $pathToCustom . '_static/img/medium-left.png?v='. $v?>" alt="">
  </div>
  <section class="rm1-wrapper-title">
    <div class="rm1-title">
      <h2><?php _e('rec_men_main_title', 'betheme') ?></h2>
    </div>
  </section>
  <div class="heart-box heart-box-advantage">
    <img class="heart-box__heart-big service-section hs18" src="<?= $pathToCustom . '_static/img/big-right.png?v='. $v?>" alt="">
    <img class="heart-box__heart-small service-section hs19" src="<?= $pathToCustom . '_static/img/small-left.png?v='. $v?>" alt="">
  </div>
  <section class="rm1-wrapper-service">
    <div class="rm1-service-img-box">
      <div class="rm1-service-img-box__image rec-image5"></div>
    </div>
    <div class="rm1-service-text-box">
      <span class="rm1-service-text-box__title"><?php _e('rec_title_5', 'betheme') ?></span>
      <span class="rm1-service-text-box__text"><?php _e('rec_text_5', 'betheme') ?></span>
      <a class="rm1-service-text-box__btn" target="_blank" href="<?= get_home_url() .'/recommendations/ua-es-lady/' ?>"><span><?php _e('service_more_button', 'betheme') ?></span></a>
    </div>
  </section>
  <section class="rm1-wrapper-service">
    <div class="rm1-service-img-box">
      <div class="rm1-service-img-box__image rec-image6"></div>
    </div>
    <div class="rm1-service-text-box">
      <span class="rm1-service-text-box__title"><?php _e('rec_title_6', 'betheme') ?></span>
      <span class="rm1-service-text-box__text"><?php _e('rec_text_6', 'betheme') ?></span>
      <a class="rm1-service-text-box__btn" target="_blank" href="<?= get_home_url() .'/recommendations/men-mistakes/' ?>"><span><?php _e('service_more_button', 'betheme') ?></span></a>
    </div>
  </section>
  <section class="rm1-wrapper-service">
    <div class="rm1-service-img-box">
      <div class="rm1-service-img-box__image rec-image7"></div>
    </div>
    <div class="rm1-service-text-box">
      <span class="rm1-service-text-box__title"><?php _e('rec_title_7', 'betheme') ?></span>
      <span class="rm1-service-text-box__text"><?php _e('rec_text_7', 'betheme') ?></span>
      <a class="rm1-service-text-box__btn" target="_blank" href="<?= get_home_url() .'/recommendations/ua-lady/' ?>"><span><?php _e('service_more_button', 'betheme') ?></span></a>
    </div>
  </section>
  <section class="rm1-wrapper-service">
    <div class="rm1-service-img-box">
      <div class="rm1-service-img-box__image rec-image8"></div>
    </div>
    <div class="rm1-service-text-box">
      <span class="rm1-service-text-box__title"><?php _e('rec_title_8', 'betheme') ?></span>
      <span class="rm1-service-text-box__text"><?php _e('rec_text_8', 'betheme') ?></span>
      <a class="rm1-service-text-box__btn" target="_blank" href="<?= get_home_url() .'/recommendations/ua-attitude/' ?>"><span><?php _e('service_more_button', 'betheme') ?></span></a>
    </div>
  </section>
  <div class="heart-box heart-box-advantage">
    <img class="heart-box__heart-medium service-section hs16" src="<?= $pathToCustom . '_static/img/medium-left.png?v='. $v?>" alt="">
    <img class="heart-box__heart-small service-section hs17" src="<?= $pathToCustom . '_static/img/small-right.png?v='. $v?>" alt="">
  </div>
  <section class="rm1-wrapper-happiness">
    <div class="rm1-title">
      <h2><?php _e('service_path_to_happiness', 'betheme') ?></h2>
    </div>
    <div class="rm1-step-box">
      <div class="rm1-step-elem">
        <div class="rm1-step-icon"><img src="<?= $pathToCustom . '_static/img/service-step.png?v='. $v?>"></div>
        <div class="rm1-step-description">
          <h3 class="rm1-step-elem-title"><?php _e('service_step_title_1', 'betheme') ?></h3>
          <p class="rm1-step-elem-delimiter">...</p>
          <p class="rm1-step-elem-desc"><?php _e('service_step_text_1', 'betheme') ?></p>
        </div>
      </div>
      <div class="rm1-step-elem">
        <div class="rm1-step-icon"><img src="<?= $pathToCustom . '_static/img/service-step.png?v='. $v?>"></div>
        <div class="rm1-step-description">
          <h3 class="rm1-step-elem-title"><?php _e('service_step_title_2', 'betheme') ?></h3>
          <p class="rm1-step-elem-delimiter">...</p>
          <p class="rm1-step-elem-desc"><?php _e('service_step_text_2', 'betheme') ?></p>
        </div>
      </div>
      <div class="rm1-step-elem">
        <div class="rm1-step-icon"><img src="<?= $pathToCustom . '_static/img/service-step.png?v='. $v?>"></div>
        <div class="rm1-step-description">
          <h3 class="rm1-step-elem-title"><?php _e('service_step_title_3', 'betheme') ?></h3>
          <p class="rm1-step-elem-delimiter">...</p>
          <p class="rm1-step-elem-desc"><?php _e('service_step_text_3', 'betheme') ?></p>
        </div>
      </div>
      <div class="rm1-step-elem">
        <div class="rm1-step-icon"><img src="<?= $pathToCustom . '_static/img/service-step.png?v='. $v?>"></div>
        <div class="rm1-step-description">
          <h3 class="rm1-step-elem-title"><?php _e('service_step_title_4', 'betheme') ?></h3>
          <p class="rm1-step-elem-delimiter">...</p>
          <p class="rm1-step-elem-desc"><?php _e('service_step_text_4', 'betheme') ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
?>
