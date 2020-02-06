<?php
/*
Template Name: for ladies
*/
get_header();
?>


<div id="Content">
	<div class="content_wrapper clearfix">

		<?php get_sidebar(); ?>
    <form action="/wp-content/themes/betheme/_сustom/actions/uploadForLadies.php" method="post" enctype="multipart/form-data">
      <section class="la1-input-section">
        <label for="la1-name">Имя</label>
        <input type="text" name="la1-name" id="la1-name" min="2" max="255">
        <label for="la1-dateOfBirth">Дата рождения</label>
        <input type="text" name="la1-dateOfBirth" id="la1-dateOfBirth" min="2" max="255">
        <label for="la1-email">Email</label>
        <input type="email" name="la1-email" id="la1-email" min="2" max="255">
        <label for="la1-phone">Телефон</label>
        <input type="text" name="la1-phone" id="la1-phone" min="2" max="255">
        <label for="la1-familyStatus">Семейное положение</label>
        <input type="text" name="la1-familyStatus" id="la1-familyStatus" min="2" max="255">
        <label for="la1-kids">Дети</label>
        <input type="text" name="la1-kids" id="la1-kids" min="2" max="255">
        <label for="la1-height">Рост</label>
        <input type="text" name="la1-height" id="la1-height" min="2" max="255">
        <label for="la1-weight">Вес</label>
        <input type="text" name="la1-weight" id="la1-weight" min="2" max="255">
        <label for="la1-eyeColor">Цвет глаз</label>
        <input type="text" name="la1-eyeColor" id="la1-eyeColor" min="2" max="255">
        <label for="la1-languages">Владение языками</label>
        <input type="text" name="la1-languages" id="la1-languages" min="2" max="255">
        <label for="la1-profession">Профессия</label>
        <input type="text" name="la1-profession" id="la1-profession" min="2" max="255">
        <label for="la1-town">Город</label>
        <input type="text" name="la1-town" id="la1-town" min="2" max="255">
        <label for="la1-country">Страна</label>
        <input type="text" name="la1-country" id="la1-country" min="2" max="255">
        <label for="la1-about">О себе</label>
        <textarea rows="4" cols="50" name="la1-about" id="la1-about"></textarea>
      </section>
      <section class="la1-uploader-section">
        <input name="upload[]" type="file" multiple="multiple" />
      </section>

      <button type="submit">Отправить</button>
    </form>
	</div>
</div>

<?php get_footer();
