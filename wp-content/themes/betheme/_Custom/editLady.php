<?php
require_once( explode( "wp-content" , __FILE__ )[0] . "wp-load.php" );
require_once 'Repository/ClientRepository.php';
use Repository\ClientRepository;
const TABLE_LADIES = 'wp_ladies';

if(empty($_GET['customer']) && !is_numeric($_GET['customer'])){
    echo 'Lady not found (';
    die();
}
$clientRepository = new ClientRepository();
$lady = $clientRepository->getById(TABLE_LADIES, $_GET['customer']);
$lady = (array)$lady[0];

if (!$lady){
    echo 'Lady not found (';
    die();
}

if(empty($_GET['_wpnonce'])){
  echo 'You are not allow to be here';
  die();
}
$pathToCustom = '/wp-content/themes/betheme/_Custom/';

?>
<link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/scss/ladies/ladiesEdit.css">

<script src="/wp-content/themes/betheme/_Custom/_static/libs/bootstrap.notify.min.js"></script>


<form action="<?php echo $pathToCustom . 'Actions/submitUpdateLady.php' ?>" class="le1-wrapper" id="le1-form" method="post" enctype="multipart/form-data">
	<input type="hidden" name="le1-id" id="le1-id" value="<?php echo $_GET['customer']?>">
	<section class="le1_input_section">
    <div class="le1_input_section__first-box">
      <label for="le1-name">Ф.И.О</label>
      <input type="text" required name="le1-name" id="le1-name" maxlength="10" class="le1-input" placeholder="Ф.И.О" value="<?php echo $lady['name']; ?>">
      <span class="error-box error-le1-name"></span>
      <label for="le1-dateOfBirth">Дата рождения</label>
      <input type="text" required name="le1-dateOfBirth" id="le1-dateOfBirth" min="2" max="255" class="le1-input" placeholder="Дата рождения" value="<?php echo $lady['date_of_birth']; ?>">
      <span class="error-box error-le1-dateOfBirth"></span>
      <label for="le1-email">Email</label>
      <input type="email" required name="le1-email" id="le1-email" min="2" max="255" class="le1-input" placeholder="Email" value="<?php echo $lady['email']; ?>">
      <span class="error-box error-le1-email"></span>
      <label for="le1-phone">Телефон</label>
      <input type="text" required name="le1-phone" id="le1-phone" min="2" max="255" class="le1-input" placeholder="Телефон" value="<?php echo $lady['phone']; ?>">
      <span class="error-box error-le1-phone"></span>
      <label for="le1-profession">Профессия</label>
      <input type="text" required name="le1-profession" id="le1-profession" min="2" max="255" class="le1-input" placeholder="Профессия" value="<?php echo $lady['profession']; ?>">
      <span class="error-box error-le1-profession"></span>
      <label for="le1-familyStatus">Семейное положение</label>
      <input type="text" required name="le1-familyStatus" id="le1-familyStatus" min="2" max="255" class="le1-input" placeholder="Семейное положение" value="<?php echo $lady['family_status']; ?>">
      <span class="error-box error-le1-familyStatus"></span>
      <label for="le1-kids">Дети</label>
      <input type="text" required name="le1-kids" id="le1-kids" min="2" max="255" class="le1-input" placeholder="Дети" value="<?php echo $lady['kids']; ?>">
      <span class="error-box error-le1-kids"></span>
      <label for="le1-video-link">Ссылка на видео о себе</label>
      <input type="text" required name="le1-video-link" id="le1-video-link" min="2" max="255" class="le1-input" placeholder="Ссылка на видео о себе" value="<?php echo $lady['video_link']; ?>">
      <span class="error-box error-le1-video-link"></span>
      <label for="le1-about">О себе</label>
      <textarea rows="4" cols="50" required name="le1-about" id="le1-about" class="le1-input" placeholder="О себе"><?php echo $lady['about']; ?></textarea>
      <span class="error-box error-le1-about"></span>
      <label for="le1-path-to-images">Пути к фотографиям</label>
      <textarea rows="4" cols="50" type="text" name="le1-path-to-images" id="le1-path-to-images"><?php echo $lady['path_to_images']; ?></textarea>
      <span class="error-box error-le1-path-to-images"></span>
    </div>
    <div class="le1_input_section__second-box">
      <label for="le1-height">Рост</label>
      <input type="text" required name="le1-height" id="le1-height" min="2" max="255" class="le1-input" placeholder="Рост" value="<?php echo $lady['height']; ?>">
      <span class="error-box error-le1-height"></span>
      <label for="le1-weight">Вес</label>
      <input type="text" required name="le1-weight" id="le1-weight" min="2" max="255" class="le1-input" placeholder="Вес" value="<?php echo $lady['weight']; ?>">
      <span class="error-box error-le1-weight"></span>
      <label for="le1-eyeColor">Цвет глаз</label>
      <input type="text" required name="le1-eyeColor" id="le1-eyeColor" min="2" max="255" class="le1-input" placeholder="Цвет глаз" value="<?php echo $lady['eye_color']; ?>">
      <span class="error-box error-le1-eyeColor"></span>
      <label for="le1-town">Город</label>
      <input type="text" required name="le1-town" id="le1-town" min="2" max="255" class="le1-input" placeholder="Город" value="<?php echo $lady['town']; ?>">
      <span class="error-box error-le1-town"></span>
      <label for="le1-country">Страна</label>
      <input type="text" required name="le1-country" id="le1-country" min="2" max="255" class="le1-input" placeholder="Страна" value="<?php echo $lady['country']; ?>">
      <span class="error-box error-le1-country"></span>
      <label for="le1-languages">Иностранные языки</label>
      <input type="text" required name="le1-languages" id="le1-languages" min="2" max="255" class="le1-input" placeholder="Иностранные языки" value="<?php echo $lady['languages']; ?>">
      <span class="error-box error-le1-languages"></span>
      <label for="le1-smoking">Курите ли Вы?</label>
      <input type="text" required name="le1-smoking" id="le1-smoking" min="2" max="255" class="le1-input" placeholder="Курите ли Вы?" value="<?php echo $lady['smoking']; ?>">
      <span class="error-box error-le1-smoking"></span>
      <label for="le1-man-wish-age">Желаемый возраст мужчины</label>
      <input type="text" name="le1-man-wish-age" id="le1-man-wish-age" min="2" max="255" class="le1-input" placeholder="Желаемый возраст мужчины" value="<?php echo $lady['man_wish_age']; ?>">
      <span class="error-box error-le1-man-wish-age"></span>
      <label for="le1-wishes-to-man">Пожелания к потенциальному партнёру</label>
      <textarea rows="4" cols="50" name="le1-wishes-to-man" id="le1-wishes-to-man" class="le1-input" placeholder="Пожелания к потенциальному партнёру"><?php echo $lady['wishes_to_man']; ?></textarea>
      <span class="error-box error-le1-wishes-to-man"></span>

      <label for="le1-main-image-path">Путь к главной фотографии</label>
      <textarea rows="4" cols="50" type="text" name="le1-main-image-path" id="le1-main-image-path"><?php echo $lady['main_image_path']; ?></textarea>
      <span class="error-box error-le1-main-image-path"></span>
    </div>
  </section>
  <section class="le1_photo_section">
  <?php
  $pathArray = explode(',',$lady['path_to_images']);
  $mainImage = str_replace(ABSPATH, get_home_url() . '/', $lady['main_image_path']);

  foreach ($pathArray as $image){
    $image = str_replace(ABSPATH, get_home_url() . '/', $image);
    $mainImageClass = ($image == $mainImage) ? 'main-image' : '';
    ?>
    <img src="<?php echo $image;?>" class="<?php echo $mainImageClass;?>" alt="lady image">
    <?php
  }

  ?>
  </section>
	<section class="le1_activated_section">
		<h3>Статус активации:</h3>
		<label for="le1-activated-yes">Активирована</label>
		<input type="radio" name="le1-activated" id="le1-activate-yes" value="1" <?php if($lady['activated']==1) echo 'checked'?>>
		<label for="le1-activated-no">Не активирована</label>
		<input type="radio" name="le1-activated" id="le1-activate-no" value="0" <?php if($lady['activated']==0) echo 'checked'?>>
	</section>
  <section class="le1_bottom_section">
    <button class="le1_bottom_section__button-save" type="submit">Сохранить</button>
    <!-- <button class="le1_bottom_section__button-activate" type="button">Активировать</button> -->
  </section>
  <script src="<?php echo $pathToCustom . '_static/js/ladies-edit.js' ?>"></script>
</form>
