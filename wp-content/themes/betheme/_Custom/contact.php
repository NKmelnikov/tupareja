<?php
/*
Template Name: Contact
*/
get_header();

$pathToCustom = '/wp-content/themes/betheme/_Custom/';
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$config = \Helper\CustomHelper::instance();
$v = $config->version();

?>
<script src="<?= $pathToCustom . '_static/fine-uploader/dnd.min.js'?>"></script>
<script src="<?= $pathToCustom . '_static/libs/bootstrap.notify.min.js'?>"></script>

<script src="https://www.google.com/recaptcha/api.js" xmlns="http://www.w3.org/1999/html"></script>
<link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/contact/contact.css?v=' . $v ?>">

<main class="cf1-wrapper">
  <section class="cf1-wrapper-image">
    <img class="cf1-image" src="/wp-content/themes/betheme/_Custom/_static/img/contact_page_new.jpg"/>
  </section>

  <section class="cf1-wrapper-info">
    <div class="text-block">
      <div class="title-block">
          <?php _e('contact_from_text', 'betheme') ?>
      </div>
	    <div class="contact-block">
		    <div class="block-contact">

			    <div class="text-box">
				    <div class="text-box__title">
					    <b><?php _e('contact_contact', 'betheme') ?></b>
				    </div>
				    <div class="line-box">
					    <img src="/wp-content/uploads/2018/11/line3.png" class="line-box__image" alt="line3" width="42" height="3"/>
				    </div>
				    <div class="text-box__content">
					    + 380 96 952 4719
					    <br>
					    + 34 63 6497535
					    <br>
					    tuparejaucraniana20@gmail.com
				    </div>
			    </div>
		    </div>
		    <br>
		    <div class="block-address">
			    <div class="text-box__title">
				    <b><?php _e('contact_address_title', 'betheme') ?></b>
			    </div>
			    <div class="address">
				    <div class="text-box">
					    <div class="line-box">
						    <img src="/wp-content/uploads/2018/11/line3.png" class="line-box__image" alt="line3" width="42" height="3"/>
					    </div>
					    <div class="text-box__content">
						    <?php _e('contact_address_text_ua', 'betheme') ?>
					    </div>
				    </div>
				    <div class="text-box">
					    <div class="line-box">
						    <img src="/wp-content/uploads/2018/11/line3.png" class="line-box__image" alt="line3" width="42" height="3"/>
					    </div>
					    <div class="text-box__content">
						    <?php _e('contact_address_text_es', 'betheme') ?>
					    </div>
				    </div>
            <div class="text-box">
              <div class="line-box">
                <img src="/wp-content/uploads/2018/11/line3.png" class="line-box__image" alt="line3" width="42" height="3"/>
              </div>
              <div class="text-box__content">
                  <?php _e('contact_address_text_es2', 'betheme') ?>
              </div>
            </div>
			    </div>
		    </div>
	    </div>
    </div>
    <div class="form-block">
      <form action="<?= $pathToCustom . 'Actions/sendContactFormEmail.php' ?>" method="POST" id="cf1-form">
        <input type="hidden" name="locale" id="cf1-local" value="<?= get_locale() ?>"/>
	      <input type="text" name="name" id="cf1-name" class="cf1-input" required placeholder="<?php _e('contact_from_name', 'betheme') ?>"/>
	      <span class="error-box error-cf1-name"></span>

	      <input type="email" name="email" id="cf1-email" class="cf1-input" required placeholder="<?php _e('contact_from_email', 'betheme') ?>"/>
	      <span class="error-box error-cf1-email"></span>
	      <!--				<span class="error-box error-cf1-name"></span>-->
	      <!--				<div class="name-email-box">-->
	      <!--					<div class="name-email-box__item">-->
	      <!--						-->
	      <!--					</div>-->
	      <!--					<div class="name-email-box__item">-->
	      <!--						-->
	      <!--					</div>-->
	      <!--				</div>-->

	      <input type="text" name="phone" id="cf1-phone" class="cf1-input" required placeholder="<?php _e('contact_from_subject', 'betheme') ?>"/>
	      <span class="error-box error-cf1-phone"></span>

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
