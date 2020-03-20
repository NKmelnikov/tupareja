<?php
/*
Template Name: Recommendations Lady
*/
get_header();
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::instance()->version();
$pathToCustom = '/wp-content/themes/betheme/_Custom/';
?>

<link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/service/service.css?v=' . $v ?>">

<main class="rc1-wrapper">
  <section class="paralax-box">
    <div class="paralax-box__image"></div>
    <div class="paralax-box__border"></div>
  </section>
  <div class="heart-box heart-box-advantage">
    <img class="heart-box__heart-medium service-section hs12" src="<?= $pathToCustom . '_static/img/medium-left.png?v='. $v?>" alt="">
  </div>
  <section class="rc1-wrapper-title">
    <div class="rc1-title">
      <h2><?php _e('rec_ladies_main_title', 'betheme') ?></h2>
    </div>
  </section>
  <div class="heart-box heart-box-advantage">
    <img class="heart-box__heart-big service-section hs18" src="<?= $pathToCustom . '_static/img/big-right.png?v='. $v?>" alt="">
    <img class="heart-box__heart-small service-section hs19" src="<?= $pathToCustom . '_static/img/small-left.png?v='. $v?>" alt="">
  </div>
  <section class="rc1-wrapper-service">
    <div class="rc1-service-img-box">
      <div class="rc1-service-img-box__image rec-image1"></div>
    </div>
    <div class="rc1-service-text-box">
      <span class="rc1-service-text-box__title"><?php _e('rec_title_1', 'betheme') ?></span>
      <span class="rc1-service-text-box__text"><?php _e('rec_text_1', 'betheme') ?></span>
      <a class="rc1-service-text-box__btn" target="_blank" href="<?= get_home_url() .'/recommendations-lady/ua-es-man/' ?>"><span><?php _e('service_more_button', 'betheme') ?></span></a>
    </div>
  </section>
  <section class="rc1-wrapper-service">
    <div class="rc1-service-img-box">
      <div class="rc1-service-img-box__image rec-image2"></div>
    </div>
    <div class="rc1-service-text-box">
      <span class="rc1-service-text-box__title"><?php _e('rec_title_2', 'betheme') ?></span>
      <span class="rc1-service-text-box__text"><?php _e('rec_text_2', 'betheme') ?></span>
      <a class="rc1-service-text-box__btn" target="_blank" href="<?= get_home_url() .'/recommendations-lady/ladies-mistakes/' ?>"><span><?php _e('service_more_button', 'betheme') ?></span></a>
    </div>
  </section>
  <section class="rc1-wrapper-service">
    <div class="rc1-service-img-box">
      <div class="rc1-service-img-box__image rec-image3"></div>
    </div>
    <div class="rc1-service-text-box">
      <span class="rc1-service-text-box__title"><?php _e('rec_title_3', 'betheme') ?></span>
      <span class="rc1-service-text-box__text"><?php _e('rec_text_3', 'betheme') ?></span>
      <a class="rc1-service-text-box__btn" target="_blank" href="<?= get_home_url() .'/recommendations-lady/es-man/' ?>"><span><?php _e('service_more_button', 'betheme') ?></span></a>
    </div>
  </section>
  <section class="rc1-wrapper-service">
    <div class="rc1-service-img-box">
      <div class="rc1-service-img-box__image rec-image4"></div>
    </div>
    <div class="rc1-service-text-box">
      <span class="rc1-service-text-box__title"><?php _e('rec_title_4', 'betheme') ?></span>
      <span class="rc1-service-text-box__text"><?php _e('rec_text_4', 'betheme') ?></span>
      <a class="rc1-service-text-box__btn" target="_blank" href="<?= get_home_url() .'/recommendations-lady/es-attitude/' ?>"><span><?php _e('service_more_button', 'betheme') ?></span></a>
    </div>
  </section>
  <div class="heart-box heart-box-advantage">
    <img class="heart-box__heart-medium service-section hs16" src="<?= $pathToCustom . '_static/img/medium-left.png?v='. $v?>" alt="">
    <img class="heart-box__heart-small service-section hs17" src="<?= $pathToCustom . '_static/img/small-right.png?v='. $v?>" alt="">
  </div>
  <section class="rc1-wrapper-happiness">
    <div class="rc1-title">
      <h2><?php _e('service_path_to_happiness', 'betheme') ?></h2>
    </div>
    <div class="rc1-step-box">
      <div class="rc1-step-elem">
        <div class="rc1-step-icon"><img src="<?= $pathToCustom . '_static/img/service-step.png?v='. $v?>"></div>
        <div class="rc1-step-description">
          <h3 class="rc1-step-elem-title"><?php _e('service_step_title_1', 'betheme') ?></h3>
          <p class="rc1-step-elem-delimiter">...</p>
          <p class="rc1-step-elem-desc"><?php _e('service_step_text_1', 'betheme') ?></p>
        </div>
      </div>
      <div class="rc1-step-elem">
        <div class="rc1-step-icon"><img src="<?= $pathToCustom . '_static/img/service-step.png?v='. $v?>"></div>
        <div class="rc1-step-description">
          <h3 class="rc1-step-elem-title"><?php _e('service_step_title_2', 'betheme') ?></h3>
          <p class="rc1-step-elem-delimiter">...</p>
          <p class="rc1-step-elem-desc"><?php _e('service_step_text_2', 'betheme') ?></p>
        </div>
      </div>
      <div class="rc1-step-elem">
        <div class="rc1-step-icon"><img src="<?= $pathToCustom . '_static/img/service-step.png?v='. $v?>"></div>
        <div class="rc1-step-description">
          <h3 class="rc1-step-elem-title"><?php _e('service_step_title_3', 'betheme') ?></h3>
          <p class="rc1-step-elem-delimiter">...</p>
          <p class="rc1-step-elem-desc"><?php _e('service_step_text_3', 'betheme') ?></p>
        </div>
      </div>
      <div class="rc1-step-elem">
        <div class="rc1-step-icon"><img src="<?= $pathToCustom . '_static/img/service-step.png?v='. $v?>"></div>
        <div class="rc1-step-description">
          <h3 class="rc1-step-elem-title"><?php _e('service_step_title_4', 'betheme') ?></h3>
          <p class="rc1-step-elem-delimiter">...</p>
          <p class="rc1-step-elem-desc"><?php _e('service_step_text_4', 'betheme') ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
?>
