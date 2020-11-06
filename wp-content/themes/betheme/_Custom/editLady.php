<?php
require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
require_once 'Repository/ClientRepository.php';
require_once 'Helper/CustomHelper.php';

use Repository\ClientRepository;
use Helper\CustomHelper;

const TABLE_LADIES = 'wp_ladies';

if (empty($_GET['customer']) && !is_numeric($_GET['customer'])) {
    echo 'Lady not found (';
    die();
}

$clientRepository = new ClientRepository();
$lady = $clientRepository->getById(TABLE_LADIES, $_GET['customer']);
$lady = (array)$lady[0];

if (!$lady) {
    echo 'Lady not found (';
    die();
}

if (empty($_GET['_wpnonce'])) {
    echo 'You are not allow to be here';
    die();
}

$pathToCustom = '/wp-content/themes/betheme/_Custom/';

CustomHelper::build();
$customHelper = CustomHelper::instance();
$v = $customHelper->version();

?>

<link rel="stylesheet" href="<?= $pathToCustom . '_static/libs/lightbox/css/lightbox.css?v=' . $v ?>">
<link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/ladies/ladiesEdit.css?v=' . $v ?>">
<link rel="stylesheet" href="<?= $pathToCustom . '_static/fine-uploader/fine-uploader.min.css' ?>">
<link rel="stylesheet" href="<?= $pathToCustom . '_static/fine-uploader/fine-uploader-gallery.min.css' ?>">
<link rel="stylesheet" href="<?= $pathToCustom . '_static/fine-uploader/fine-uploader-new.min.css' ?>">

<script src="<?= $pathToCustom . '_static/fine-uploader/jquery.fine-uploader.min.js' ?>"></script>
<script src="<?= $pathToCustom . '_static/libs/lightbox/js/lightbox.js?v=' . $v ?>"></script>
<script src="<?= $pathToCustom . '_static/fine-uploader/dnd.min.js' ?>"></script>
<script src="<?= $pathToCustom . '_static/fine-uploader/fine-uploader.core.min.js' ?>"></script>
<script src="<?= $pathToCustom . '_static/fine-uploader/fine-uploader.min.js' ?>"></script>

<form action="<?php echo $pathToCustom . 'Actions/submitUpdateLady.php' ?>" class="le1-wrapper" id="le1-form" method="post" enctype="multipart/form-data">
  <input type="hidden" name="le1-id" id="le1-id" value="<?php echo $_GET['customer'] ?>">
  <section class="le1_input_section">
    <div class="le1_input_section__first-box">
      <div class="le1-name-container">
        <div class="le1-name-box">
          <label for="le1-lname">Аpellido</label>
          <input type="text" name="le1-lname" id="le1-lname" maxlength="125" class="le1-input translate-value" placeholder="Фамилия" value="<?php echo $lady['lname']; ?>">
          <span class="error-box error-le1-lname"></span>
        </div>
        <div class="le1-name-box">
          <label for="le1-name">Nombre</label>
          <input type="text" required name="le1-name" id="le1-name" maxlength="125" class="le1-input translate-value" placeholder="Имя" value="<?php echo $lady['name']; ?>">
          <span class="error-box error-le1-name"></span>
        </div>
        <div class="le1-fname-box">
          <label for="le1-fname">Segundo nombre</label>
          <input type="text" name="le1-fname" id="le1-fname" maxlength="125" class="le1-input translate-value" placeholder="Отчество" value="<?php echo $lady['fname']; ?>">
          <span class="error-box error-le1-fname"></span>
        </div>
      </div>
      <label for="le1-dateOfBirth">Fecha de nacimiento</label>
      <input type="text" required name="le1-dateOfBirth" id="le1-dateOfBirth" min="2" max="255" class="le1-input" placeholder="Дата рождения" value="<?php echo date('Y-m-d', $lady['date_of_birth']); ?>">
      <span class="error-box error-le1-dateOfBirth"></span>
      <label for="le1-email">Email</label>
      <input type="email" required name="le1-email" id="le1-email" min="2" max="255" class="le1-input" placeholder="Email" value="<?php echo $lady['email']; ?>">
      <span class="error-box error-le1-email"></span>
      <label for="le1-phone">Número de teléfono</label>
      <input type="text" required name="le1-phone" id="le1-phone" min="2" max="255" class="le1-input" placeholder="Телефон" value="<?php echo $lady['phone']; ?>">
      <span class="error-box error-le1-phone"></span>
      <label for="le1-profession">Profesión</label>
      <input type="text" required name="le1-profession" id="le1-profession" min="2" max="255" class="le1-input translate-value" placeholder="Профессия" value="<?php echo $lady['profession']; ?>">
      <span class="error-box error-le1-profession"></span>
      <label for="le1-familyStatus">Estado civil</label>
      <input type="text" required name="le1-familyStatus" id="le1-familyStatus" min="2" max="255" class="le1-input translate-value" placeholder="Семейное положение" value="<?php echo $lady['family_status']; ?>">
      <span class="error-box error-le1-familyStatus"></span>
      <label for="le1-kids">Niños</label>
      <input type="text" required name="le1-kids" id="le1-kids" min="2" max="255" class="le1-input translate-value" placeholder="Дети translate-value" value="<?php echo $lady['kids']; ?>">
      <span class="error-box error-le1-kids"></span>
      <label for="le1-video-link">Enlace de video sobre usted</label>
      <input type="text" required name="le1-video-link" id="le1-video-link" min="2" max="255" class="le1-input" placeholder="Ссылка на видео о себе" value="<?php echo $lady['video_link']; ?>">
      <span class="error-box error-le1-video-link"></span>
      <label for="le1-about">Sobre mi</label>
      <textarea rows="4" cols="50" required name="le1-about" id="le1-about" class="le1-input translate-value" placeholder="О себе"><?php echo $lady['about']; ?></textarea>
      <span class="error-box error-le1-about"></span>
      <label for="le1-path-to-images">Caminos a las fotos</label>
      <textarea rows="4" cols="50" type="text" name="le1-path-to-images" id="le1-path-to-images"><?php echo $lady['path_to_images']; ?></textarea>
      <input type="hidden" id="le1-path-to-images-1" name="le1-path-to-images-1">
      <span class="error-box error-le1-path-to-images"></span>
    </div>
    <div class="le1_input_section__second-box">
      <label for="le1-height">Altura</label>
      <input type="text" required name="le1-height" id="le1-height" min="2" max="255" class="le1-input" placeholder="Рост" value="<?php echo $lady['height']; ?>">
      <span class="error-box error-le1-height"></span>
      <label for="le1-weight">Peso</label>
      <input type="text" required name="le1-weight" id="le1-weight" min="2" max="255" class="le1-input" placeholder="Вес" value="<?php echo $lady['weight']; ?>">
      <span class="error-box error-le1-weight"></span>
      <div class="le1-color-container">
        <div class="le1-color-box">
          <label for="le1-eyeColor">Color de los ojos</label>
          <input type="text" required name="le1-eyeColor" id="le1-eyeColor" min="2" max="255" class="le1-input translate-value" placeholder="Цвет глаз" value="<?php echo $lady['eye_color']; ?>">
          <span class="error-box error-le1-eyeColor"></span>
        </div>
        <div class="le1-color-box">
          <label for="le1-hair_color">Color del cabello</label>
          <input type="text" required name="le1-hair_color" id="le1-hair_color" min="2" max="255" class="le1-input translate-value" placeholder="Цвет волос" value="<?php echo $lady['hair_color']; ?>">
          <span class="error-box error-le1-hair_color"></span>
        </div>
      </div>
      <label for="le1-town">Ciudad</label>
      <input type="text" required name="le1-town" id="le1-town" min="2" max="255" class="le1-input translate-value" placeholder="Город" value="<?php echo $lady['town']; ?>">
      <span class="error-box error-le1-town"></span>
      <label for="le1-country">Pais</label>
      <input type="text" required name="le1-country" id="le1-country" min="2" max="255" class="le1-input translate-value" placeholder="Страна" value="<?php echo $lady['country']; ?>">
      <span class="error-box error-le1-country"></span>
      <label for="le1-languages">Idiomas extranjeros</label>
      <input type="text" required name="le1-languages" id="le1-languages" min="2" max="255" class="le1-input translate-value" placeholder="Иностранные языки" value="<?php echo $lady['languages']; ?>">
      <span class="error-box error-le1-languages"></span>
      <label for="le1-smoking">Fuma?</label>
      <input type="text" name="le1-smoking" id="le1-smoking" min="2" max="255" class="le1-input translate-value" placeholder="Курите ли Вы?" value="<?php echo $lady['smoking']; ?>">
      <span class="error-box error-le1-smoking"></span>
      <label for="le1-man-wish-age">Edad deseada del hombre</label>
      <input type="text" name="le1-man-wish-age" id="le1-man-wish-age" min="2" max="255" class="le1-input" placeholder="Желаемый возраст мужчины" value="<?php echo $lady['man_wish_age']; ?>">
      <span class="error-box error-le1-man-wish-age"></span>
      <label for="le1-wishes-to-man">Deseos a un socio potencial</label>
      <textarea rows="4" cols="50" name="le1-wishes-to-man" id="le1-wishes-to-man" class="le1-input translate-value" placeholder="Пожелания к потенциальному партнёру"><?php echo $lady['wishes_to_man']; ?></textarea>
      <span class="error-box error-le1-wishes-to-man"></span>
      <label for="le1-main-image-path">El camino a la foto principal</label>
      <textarea rows="4" cols="50" type="text" name="le1-main-image-path" id="le1-main-image-path"><?php echo $lady['main_image_path']; ?></textarea>
    </div>
  </section>
  <section class="le1_photo_section">
      <?php
      $pathArray = explode(',', $lady['path_to_images']);
      $mainImage = str_replace(ABSPATH, get_home_url() . '/', $lady['main_image_path']);
      ?>
      <?php
      foreach ($pathArray as $imgPath) {
          $imageLink = str_replace(ABSPATH, get_home_url() . '/', $imgPath);
          $mainImageClass = ($imageLink == $mainImage) ? 'main-image' : '';
          ?>
        <div class="image-wrap <?= $mainImageClass ?>">
          <button class="delete-image">Eliminar</button>
          <button class="change-main-image">Haz lo principal</button>
          <a href="<?php echo $imageLink; ?>" data-path="<?= $imgPath ?>" data-lightbox="roadtrip">
            <img src="<?php echo $imageLink; ?>" class="le1-lady-image <?= $mainImageClass ?>" alt="lady image">
          </a>
        </div>
          <?php
      }
      ?>
  </section>
  <?php if (strpos($lady['video_link'], 'no_video') === false): ?>
  <section class="le1-video-section">
    <video src="<?= $customHelper->convertImgPath($lady['video_link']); ?>" controls></video>
    <button class="delete-video">Eliminar video</button>
  </section>
  <?php else: ?>
    <section class="le1-upload-video-section">
      <input type="button" id="le1-fake-file-input" value="Subir video"/>
      <input type="file" id="le1-video-upload" name="le1-video-upload" class="le1-input le1-video-upload">
      <span id="le1-fileName-text"></span>
      <span class="error-box error-le1-video-upload"></span>
    </section>
  <?php endif; ?>

  <section class="le1-uploader-section">
    <!-- Fine Uploader Gallery template
====================================================================== -->
    <script type="text/template" id="qq-template-gallery">
      <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Sube hasta 5 fotos">
        <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
          <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
        </div>
        <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
          <span class="qq-upload-drop-area-text-selector"></span>
        </div>
        <div class="qq-upload-button-selector qq-upload-button">
          <div>Descargar</div>
        </div>
        <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Procesando archivos descartados ...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
        <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
          <li>
            <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
            <div class="qq-progress-bar-container-selector qq-progress-bar-container">
              <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
            </div>
            <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
            <div class="qq-thumbnail-wrapper">
              <img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
            </div>
            <button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
            <button type="button" class="qq-upload-retry-selector qq-upload-retry">
              <span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
              Procesar de nuevo
            </button>

            <div class="qq-file-info">
              <div class="qq-file-name">
                <span class="qq-upload-file-selector qq-upload-file"></span>
                <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
              </div>
              <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
              <span class="qq-upload-size-selector qq-upload-size"></span>
              <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
                <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
              </button>
              <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
                <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
              </button>
              <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
                <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
              </button>
            </div>
          </li>
        </ul>

        <dialog class="qq-alert-dialog-selector">
          <div class="qq-dialog-message-selector"></div>
          <div class="qq-dialog-buttons">
            <button type="button" class="qq-cancel-button-selector">Cerca</button>
          </div>
        </dialog>

        <dialog class="qq-confirm-dialog-selector">
          <div class="qq-dialog-message-selector"></div>
          <div class="qq-dialog-buttons">
            <button type="button" class="qq-cancel-button-selector">No</button>
            <button type="button" class="qq-ok-button-selector">Si</button>
          </div>
        </dialog>

        <dialog class="qq-prompt-dialog-selector">
          <div class="qq-dialog-message-selector"></div>
          <input type="text">
          <div class="qq-dialog-buttons">
            <button type="button" class="qq-cancel-button-selector">Cerca</button>
            <button type="button" class="qq-ok-button-selector">Ok</button>
          </div>
        </dialog>
      </div>
    </script>
    <!-- Fine Uploader DOM Element
    ====================================================================== -->
    <div id="fine-uploader-gallery"></div>

    <!-- Your code to create an instance of Fine Uploader and bind to the DOM/template
    ====================================================================== -->
    <script src="<?php echo $pathToCustom . '_static/js/fine-uploader-connect.js?v=' . $v ?> ?>"></script>

  </section>
  <section class="le1_activated_section">
    <h3>Estado de activación:</h3>
    <label for="le1-activated-yes">Activado</label>
    <input type="radio" name="le1-activated" id="le1-activate-yes" value="1" <?php if ($lady['activated'] == 1) echo 'checked' ?>>
    <label for="le1-activated-no">No activado</label>
    <input type="radio" name="le1-activated" id="le1-activate-no" value="0" <?php if ($lady['activated'] == 0) echo 'checked' ?>>
  </section>

  <section class="le1_bottom_section">
    <button class="le1_bottom_section__button-save" type="submit">Guardar</button>
    <button class="le1_bottom_section__button-translate" type="button">Traducir</button>
  </section>

  <script src="<?= $pathToCustom . '_static/libs/bootstrap.notify.min.js' ?>"></script>
  <script src="<?= $pathToCustom . '_static/js/ladies-edit.js?v=' . $v ?>"></script>
  <script src="<?= $pathToCustom . '_static/js/ladies-edit-translate.js?v=' . $v ?>"></script>
</form>
