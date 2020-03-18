<?php
/*
Template Name: Our Services
*/
get_header();
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::instance()->version();
$pathToCustom = '/wp-content/themes/betheme/_Custom/';
?>

<link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/service/service.css?v=' . $v ?>">
<main class="os1-wrapper">
  <section class="paralax-box">
    <div class="paralax-box__image"></div>
    <div class="paralax-box__border"></div>
  </section>
  <div class="heart-box heart-box-advantage">
    <img class="heart-box__heart-medium service-section hs12" src="<?= $pathToCustom . '_static/img/medium-left.png?v='. $v?>" alt="">
  </div>
  <section class="os1-wrapper-title">
    <div class="os1-title">
      <h2><?php _e('service_our', 'betheme') ?></h2>
      <p><?php _e('service_find_your_love', 'betheme') ?></p>
    </div>
  </section>
  <div class="heart-box heart-box-advantage">
    <img class="heart-box__heart-big service-section hs13" src="<?= $pathToCustom . '_static/img/big-right.png?v='. $v?>" alt="">
    <img class="heart-box__heart-small service-section hs14" src="<?= $pathToCustom . '_static/img/small-left.png?v='. $v?>" alt="">
    <img class="heart-box__heart-small service-section hs15" src="<?= $pathToCustom . '_static/img/small-right.png?v='. $v?>" alt="">
  </div>
  <section class="os1-wrapper-service">
    <div class="os1-service-img-box">
      <div class="os1-service-img-box__image image1"></div>
    </div>
    <div class="os1-service-text-box">
      <span class="os1-service-text-box__title"><?php _e('service_title_1', 'betheme') ?></span>
      <span class="os1-service-text-box__text"><?php _e('service_text_1', 'betheme') ?></span>
      <a class="os1-service-text-box__btn" target="_blank" href="/our-service/dates-ucraine/"><span><?php _e('service_more_button', 'betheme') ?></span></a>
    </div>
  </section>
  <section class="os1-wrapper-service">
    <div class="os1-service-img-box">
      <div class="os1-service-img-box__image image2"></div>
    </div>
    <div class="os1-service-text-box">
      <span class="os1-service-text-box__title"><?php _e('service_title_2', 'betheme') ?></span>
      <span class="os1-service-text-box__text"><?php _e('service_text_2', 'betheme') ?></span>
      <a class="os1-service-text-box__btn" target="_blank" href="/our-service/trip-to-spain/"><span><?php _e('service_more_button', 'betheme') ?></span></a>
    </div>
  </section>
  <section class="os1-wrapper-service">
    <div class="os1-service-img-box">
      <div class="os1-service-img-box__image image3"></div>
    </div>
    <div class="os1-service-text-box">
      <span class="os1-service-text-box__title"><?php _e('service_title_3', 'betheme') ?></span>
      <span class="os1-service-text-box__text"><?php _e('service_text_3', 'betheme') ?></span>
      <a class="os1-service-text-box__btn" target="_blank" href="/our-service/event-dates/"><span><?php _e('service_more_button', 'betheme') ?></span></a>
    </div>
  </section>
  <section class="os1-wrapper-service">
    <div class="os1-service-img-box">
      <div class="os1-service-img-box__image image4"></div>
    </div>
    <div class="os1-service-text-box">
      <span class="os1-service-text-box__title"><?php _e('service_title_4', 'betheme') ?></span>
      <span class="os1-service-text-box__text"><?php _e('service_text_4', 'betheme') ?></span>
      <a class="os1-service-text-box__btn" target="_blank" href="/our-service/translator/"><span><?php _e('service_more_button', 'betheme') ?></span></a>
    </div>
  </section>
  <section class="os1-wrapper-service">
    <div class="os1-service-img-box">
      <div class="os1-service-img-box__image image5"></div>
    </div>
    <div class="os1-service-text-box">
      <span class="os1-service-text-box__title"><?php _e('service_title_5', 'betheme') ?></span>
      <span class="os1-service-text-box__text"><?php _e('service_text_5', 'betheme') ?></span>
      <a class="os1-service-text-box__btn" target="_blank" href="/our-service/transfer/"><span><?php _e('service_more_button', 'betheme') ?></span></a>
    </div>
  </section>
  <section class="os1-wrapper-service">
    <div class="os1-service-img-box">
      <div class="os1-service-img-box__image image6"></div>
    </div>
    <div class="os1-service-text-box">
      <span class="os1-service-text-box__title"><?php _e('service_title_6', 'betheme') ?></span>
      <span class="os1-service-text-box__text"><?php _e('service_text_6', 'betheme') ?></span>
      <a class="os1-service-text-box__btn" target="_blank" href="/our-service/flowers/"><span><?php _e('service_more_button', 'betheme') ?></span></a>
    </div>
  </section>
  <section class="os1-wrapper-service">
    <div class="os1-service-img-box">
      <div class="os1-service-img-box__image image7"></div>
    </div>
    <div class="os1-service-text-box">
      <span class="os1-service-text-box__title"><?php _e('service_title_7', 'betheme') ?></span>
      <span class="os1-service-text-box__text"><?php _e('service_text_7', 'betheme') ?></span>
      <a class="os1-service-text-box__btn" target="_blank" href="/our-service/wedding/"><span><?php _e('service_more_button', 'betheme') ?></span></a>
    </div>
  </section>
  <div class="heart-box heart-box-advantage">
    <img class="heart-box__heart-medium service-section hs16" src="<?= $pathToCustom . '_static/img/medium-left.png?v='. $v?>" alt="">
    <img class="heart-box__heart-small service-section hs17" src="<?= $pathToCustom . '_static/img/small-right.png?v='. $v?>" alt="">
  </div>
  <section class="os1-wrapper-happiness">
    <div class="os1-title">
      <h2><?php _e('service_path_to_happiness', 'betheme') ?></h2>
    </div>
    <div class="os1-step-box">
      <div class="os1-step-elem">
        <div class="os1-step-icon"><img src="<?= $pathToCustom . '_static/img/service-step.png?v='. $v?>"></div>
        <div class="os1-step-description">
          <h3 class="os1-step-elem-title"><?php _e('service_step_title_1', 'betheme') ?></h3>
          <p class="os1-step-elem-delimiter">...</p>
          <p class="os1-step-elem-desc"><?php _e('service_step_text_1', 'betheme') ?></p>
        </div>
      </div>
      <div class="os1-step-elem">
        <div class="os1-step-icon"><img src="<?= $pathToCustom . '_static/img/service-step.png?v='. $v?>"></div>
        <div class="os1-step-description">
          <h3 class="os1-step-elem-title"><?php _e('service_step_title_2', 'betheme') ?></h3>
          <p class="os1-step-elem-delimiter">...</p>
          <p class="os1-step-elem-desc"><?php _e('service_step_text_2', 'betheme') ?></p>
        </div>
      </div>
      <div class="os1-step-elem">
        <div class="os1-step-icon"><img src="<?= $pathToCustom . '_static/img/service-step.png?v='. $v?>"></div>
        <div class="os1-step-description">
          <h3 class="os1-step-elem-title"><?php _e('service_step_title_3', 'betheme') ?></h3>
          <p class="os1-step-elem-delimiter">...</p>
          <p class="os1-step-elem-desc"><?php _e('service_step_text_3', 'betheme') ?></p>
        </div>
      </div>
      <div class="os1-step-elem">
        <div class="os1-step-icon"><img src="<?= $pathToCustom . '_static/img/service-step.png?v='. $v?>"></div>
        <div class="os1-step-description">
          <h3 class="os1-step-elem-title"><?php _e('service_step_title_4', 'betheme') ?></h3>
          <p class="os1-step-elem-delimiter">...</p>
          <p class="os1-step-elem-desc"><?php _e('service_step_text_4', 'betheme') ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
?>
