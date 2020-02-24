<?php
/*
Template Name: for Men
*/
get_header();

$pathToCustom = '/wp-content/themes/betheme/_Custom/';
?>
  <link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/libs/animate.css">
  <link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/scss/men/men.css">


  <script src="/wp-content/themes/betheme/_Custom/_static/fine-uploader/dnd.min.js"></script>
  <script src="/wp-content/themes/betheme/_Custom/_static/libs/bootstrap.notify.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <div id="Content" class="container">
    <div class="content_wrapper clearfix ">

      <article class="ma1-article">
        <p>Вся контактная информация, а также фамилия и полная дата рождения — строго конфиденциальны и не публикуются на сайте!</p>
      </article>
      <form action="<?php echo $pathToCustom . 'Actions/submitApplicationMan.php' ?>" class="ma1-wrapper" id="ma1-form" method="post" enctype="multipart/form-data">
        <section class="ma1-input-section">
          <div class="ma1-input-section__first-box">
            <input type="text" required name="ma1-name" id="ma1-name" min="2" max="255" class="ma1-input" placeholder="Ф.И.О">
            <span class="error-box error-ma1-name"></span>

            <input type="text" required name="ma1-dateOfBirth" id="ma1-dateOfBirth" min="2" max="255" class="ma1-input" placeholder="Дата рождения">
            <span class="error-box error-ma1-dateOfBirth"></span>

            <input type="email" required name="ma1-email" id="ma1-email" min="2" max="255" class="ma1-input" placeholder="Email">
            <span class="error-box error-ma1-email"></span>

            <input type="text" required name="ma1-phone" id="ma1-phone" min="2" max="255" class="ma1-input" placeholder="Телефон">
            <span class="error-box error-ma1-phone"></span>

	          <input type="text" required name="ma1-country" id="ma1-country" min="2" max="255" class="ma1-input" placeholder="Страна">
	          <span class="error-box error-ma1-country"></span>

            <input type="text" required name="ma1-town" id="ma1-town" min="2" max="255" class="ma1-input" placeholder="Город">
            <span class="error-box error-ma1-town"></span>
          </div>

        </section>

	      <section class="ma1-bottom-section">
          <div class="g-recaptcha" data-sitekey="6LdRaDMUAAAAAOwHA7zXiR1sAEbA2yQ9gwt7bbo0"></div>
          <button class="ma1-submit" type="submit">Отправить</button>
        </section>
      </form>
    </div>

    <script src="<?php echo $pathToCustom . '_static/js/for-men.js' ?>"></script>
  </div>

<?php get_footer();
