<?php
/*
Template Name: for man's
*/
get_header();

$pathToCustom = '/wp-content/themes/betheme/_Custom/';
?>
  <link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/scss/mans/mans.css">

  <script src="/wp-content/themes/betheme/_Custom/_static/fine-uploader/dnd.min.js"></script>
  <script src="/wp-content/themes/betheme/_Custom/_static/js/bootstrap.notify.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <div id="Content" class="container">
    <div class="content_wrapper clearfix ">

      <article class="ma1-article">
        <p>Вся контактная информация, а также фамилия и полная дата рождения — строго конфиденциальны и не публикуются на сайте!</p>
        <p>Наши рекомендации по заполнению анкеты:</p>
	      <ul>
            <li>Выделите качества, которые делают вас особенной</li>
            <li>Расскажите подробно о своих увлечениях и хобби</li>
            <li>Укажите оригинальное жизненное кредо</li>
            <li>Опишите, какие качества Вы хотите видеть в своем избраннике</li>
            <li>Предоставляйте только реальную информацию (не скрывайте свой возраст либо наличие детей)</li>
            <li>Прикрепите удачные фото, где можно хорошо рассмотреть Ваши черты лица и особенности фигуры (снимки не должны быть вульгарными)</li>
            <li>Не создавайте придуманного образа, несоответствие с ним может оттолкнуть мужчину</li>
		      <li>Сделайте коротенькое качественное видео, где можно увидеть вас в реальной жизни</li>
        </ul>
      </article>
      <form action="<?php echo $pathToCustom . 'Actions/submitApplication.php' ?>" class="ma1-wrapper" id="ma1form" method="post" enctype="multipart/form-data">
        <section class="ma1-input-section">
          <div class="ma1-input-section__first-box">
            <input type="text" required name="ma1-name" id="ma1-name" min="2" max="255" class="ma1-input" placeholder="Ф.И.О">
            <span class="error-box error ma1-name"></span>

            <input type="text" required name="ma1-dateOfBirth" id="ma1-dateOfBirth" min="2" max="255" class="ma1-input" placeholder="Дата рождения">
            <span class="error-box error ma1-dateOfBirth"></span>

            <input type="email" required name="ma1-email" id="ma1-email" min="2" max="255" class="ma1-input" placeholder="Email">
            <span class="error-box error ma1-email"></span>

            <input type="text" required name="ma1-phone" id="ma1-phone" min="2" max="255" class="ma1-input" placeholder="Телефон">
            <span class="error-box error ma1-phone"></span>

	          <input type="text" required name="ma1-country" id="ma1-country" min="2" max="255" class="ma1-input" placeholder="Страна">
	          <span class="error-box error ma1-country"></span>
          </div>

        </section>

	      <section class="ma1-bottom-section">
          <div class="g-recaptcha" data-sitekey="6LdRaDMUAAAAAOwHA7zXiR1sAEbA2yQ9gwt7bbo0"></div>
          <button class="ma1-submit" disabled type="submit">Отправить</button>
        </section>
      </form>
    </div>

    <script src="<?php echo $pathToCustom . '_static/js/for-mans.js' ?>"></script>
  </div>

<?php get_footer();
