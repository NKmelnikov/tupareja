<?php
/*
Template Name: Contact
*/
get_header();

$pathToCustom = '/wp-content/themes/betheme/_Custom/';
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$config = \Helper\CustomHelper::instance();
$v = $config->version();
$defaultUrl = $config->host_ru();

?>
<script src="<?= $pathToCustom . '_static/fine-uploader/dnd.min.js'?>"></script>
<script src="<?= $pathToCustom . '_static/libs/bootstrap.notify.min.js'?>"></script>

<script src="https://www.google.com/recaptcha/api.js" xmlns="http://www.w3.org/1999/html"></script>
<link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/contact/contact.css?v=' . $v ?>">

<main class="cf1-wrapper">
  <section class="cf1-wrapper-image">
    <img class="cf1-image" src="<?= $defaultUrl . '/wp-content/uploads/2018/11/model2-contact-main-bg.jpg' ?>"/>
  </section>

  <section class="cf1-wrapper-info">
    <div class="text-block">
      <div class="title-block">
          <?php _e('contact_from_text', 'betheme') ?>
      </div>
      <div class="contact-block">
        <div class="block-contact">
          <div class="line-box">
            <img src="<?= $defaultUrl . '/wp-content/uploads/2018/11/line3.png' ?>" class="line-box__image" alt="line3" width="42" height="3"/>
          </div>
          <div class="text-box">
            <div class="text-box__title">
                <?php _e('contact_contact', 'betheme') ?>
            </div>
            <div class="text-box__content">
              + 38 050 1474440
              <br>
              + 34 66 2426485
              <br>
              info@tuparejaucraniana.com
            </div>
          </div>
        </div>
        <div class="block-address">
          <div class="line-box">
            <img src="<?= $defaultUrl . '/wp-content/uploads/2018/11/line3.png' ?>" class="line-box__image" alt="line3" width="42" height="3"/>
          </div>
          <div class="text-box">
            <div class="text-box__title">
                <?php _e('contact_address', 'betheme') ?>
            </div>
            <div class="text-box__content">
                <?php _e('contact_address_text', 'betheme') ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-block">
      <form action="<?= $pathToCustom . 'Actions/sendContactFormEmail.php' ?>" method="POST" id="cf1-form">
        <div class="name-email-box">
          <div class="name-email-box__item">
            <input type="text" name="name" id="cf1-name" class="cf1-input" required placeholder="<?php _e('contact_from_name', 'betheme') ?>"/>
            <span class="error-box error-cf1-name"></span>
          </div>
          <div class="name-email-box__item">
            <input type="email" name="email" id="cf1-email" class="cf1-input" required placeholder="<?php _e('contact_from_email', 'betheme') ?>"/>
            <span class="error-box error-cf1-email"></span>
          </div>
        </div>

        <input type="text" name="subject" id="cf1-subject" class="cf1-input" required placeholder="<?php _e('contact_from_subject', 'betheme') ?>"/>
        <span class="error-box error-cf1-subject"></span>

        <textarea cols="30" rows="5" type="text" name="message" id="cf1-message" class="cf1-input" required placeholder="<?php _e('contact_from_message', 'betheme') ?>"/></textarea>
        <span class="error-box error-cf1-message"></span>

        <div class="captcha-block">
          <div class="g-recaptcha" data-sitekey="6LdRaDMUAAAAAOwHA7zXiR1sAEbA2yQ9gwt7bbo0"></div>
          <button type="submit" id="cf1-submit" class=""/><?php _e('contact_from_submit', 'betheme') ?></button>
        </div>
      </form>
    </div>
  </section>

  <section class="cf1-wrapper-form">


  </section>
</main>

<script src="<?php echo $pathToCustom . '_static/js/contact.js?v=' . $v ?>"></script>

<?php
get_footer();
?>
