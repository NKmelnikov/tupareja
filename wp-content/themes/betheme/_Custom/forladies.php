<?php
/*
Template Name: for ladies
*/
get_header();

//spl_autoload_register(function ($class) {
//    echo 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
//    echo "/wp-content/themes/betheme/_Custom/$class.php";
//
//    require_once "/wp-content/themes/betheme/_Custom/$class.php";
//});
$pathToCustom = '/wp-content/themes/betheme/_Custom/';
?>
  <link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/fine-uploader/fine-uploader.min.css">
  <link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/fine-uploader/fine-uploader-gallery.min.css">
  <link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/fine-uploader/fine-uploader-new.min.css">
  <link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/scss/ladies/ladies.css">

  <!--  <script src="/wp-content/themes/betheme/_Custom/_static/js/jquery-3.4.1.slim.min.js"></script>-->
  <script src="/wp-content/themes/betheme/_Custom/_static/fine-uploader/jquery.fine-uploader.min.js"></script>
  <script src="/wp-content/themes/betheme/_Custom/_static/fine-uploader/dnd.min.js"></script>
  <script src="/wp-content/themes/betheme/_Custom/_static/fine-uploader/fine-uploader.core.min.js"></script>
  <script src="/wp-content/themes/betheme/_Custom/_static/fine-uploader/fine-uploader.min.js"></script>
  <script src="/wp-content/themes/betheme/_Custom/_static/js/bootstrap.notify.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <div id="Content" class="container">
    <div class="content_wrapper clearfix ">

      <article class="la1-article">
        <p>Fusce ut velit laoreet, tempus arcu eu, molestie tortor.
          Nam vel justo cursus, faucibus lorem eget, egestas eros.
          Maecenas eleifend erat at justo fringilla imperdiet id ac magna.
          Suspendisse vel facilisis odio, at ornare nibh. In malesuada, tortor eget sodales mollis,
        </p>
        <ul>
            <li>Выделите качества, которые делают вас особенной</li>
            <li>Расскажите подробно о своих увлечениях и хобби</li>
            <li>Укажите оригинальное жизненное кредо</li>
            <li>Опишите, какие качества Вы хотите видеть в своем избраннике</li>
            <li>Предоставляйте только реальную информацию (не скрывайте свой возраст либо наличие детей)</li>
            <li>Предоставляйте только реальную информацию (не скрывайте свой возраст либо наличие детей)</li>
            <li>Прикрепите удачные фото, где можно хорошо рассмотреть Ваши черты лица и особенности фигуры (профессиональные фото не обязательны, но снимки не должны быть вульгарными)</li>
        </ul>
      </article>
      <form action="<?php echo $pathToCustom . 'Actions/submitApplication.php' ?>" class="la1-wrapper" id="la1-form" method="post" enctype="multipart/form-data">
        <section class="la1-input-section">
          <div class="la1-input-section__first-box">
            <input type="text" required name="la1-name" id="la1-name" min="2" max="255" class="la1-input" placeholder="Ф.И.О">
            <span class="error-box error-la1-name"></span>

            <input type="text" required name="la1-dateOfBirth" id="la1-dateOfBirth" min="2" max="255" class="la1-input" placeholder="Дата рождения">
            <span class="error-box error-la1-dateOfBirth"></span>

            <input type="email" required name="la1-email" id="la1-email" min="2" max="255" class="la1-input" placeholder="Email">
            <span class="error-box error-la1-email"></span>

            <input type="text" required name="la1-phone" id="la1-phone" min="2" max="255" class="la1-input" placeholder="Телефон">
            <span class="error-box error-la1-phone"></span>

            <input type="text" required name="la1-profession" id="la1-profession" min="2" max="255" class="la1-input" placeholder="Профессия">
            <span class="error-box error-la1-profession"></span>

            <input type="text" required name="la1-familyStatus" id="la1-familyStatus" min="2" max="255" class="la1-input" placeholder="Семейное положение">
            <span class="error-box error-la1-familyStatus"></span>

            <input type="text" required name="la1-kids" id="la1-kids" min="2" max="255" class="la1-input" placeholder="Дети">
            <span class="error-box error-la1-kids"></span>

            <input type="text" required name="la1-video-link" id="la1-video-link" min="2" max="255" class="la1-input" placeholder="Ссылка на видео о себе">
            <span class="error-box error-la1-video-link"></span>

            <textarea rows="4" cols="50" required name="la1-about" id="la1-about" class="la1-input" placeholder="О себе"></textarea>
            <span class="error-box error-la1-about"></span>
          </div>
          <div class="la1-input-section__second-box">
            <input type="text" required name="la1-height" id="la1-height" min="2" max="255" class="la1-input" placeholder="Рост">
            <span class="error-box error-la1-height"></span>

            <input type="text" required name="la1-weight" id="la1-weight" min="2" max="255" class="la1-input" placeholder="Вес">
            <span class="error-box error-la1-weight"></span>

            <input type="text" required name="la1-eyeColor" id="la1-eyeColor" min="2" max="255" class="la1-input" placeholder="Цвет глаз">
            <span class="error-box error-la1-eyeColor"></span>

            <input type="text" required name="la1-town" id="la1-town" min="2" max="255" class="la1-input" placeholder="Город">
            <span class="error-box error-la1-town"></span>

            <input type="text" required name="la1-country" id="la1-country" min="2" max="255" class="la1-input" placeholder="Страна">
            <span class="error-box error-la1-country"></span>

            <input type="text" required name="la1-languages" id="la1-languages" min="2" max="255" class="la1-input" placeholder="Иностранные языки">
            <span class="error-box error-la1-languages"></span>

            <input type="text" required name="la1-smoking" id="la1-smoking" min="2" max="255" class="la1-input" placeholder="Курите ли Вы?">
            <span class="error-box error-la1-smoking"></span>

            <input type="text" name="la1-man-wish-age" id="la1-man-wish-age" min="2" max="255" class="la1-input" placeholder="Желаемый возраст мужчины">
            <span class="error-box error-la1-man-wish-age"></span>

            <textarea rows="4" cols="50" name="la1-wishes-to-man" id="la1-wishes-to-man" class="la1-input" placeholder="Пожелания к потенциальному партнёру"></textarea>
            <span class="error-box error-la1-wishes-to-man"></span>

            <input type="hidden" name="la1-path-to-images" id="la1-path-to-images">
            <input type="hidden" name="la1-main-image-path" id="la1-main-image-path">
          </div>

        </section>
        <section class="la1-uploader-section">
          <!-- Fine Uploader Gallery template
     ====================================================================== -->
          <script type="text/template" id="qq-template-gallery">
            <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Загрузите 4 фоторафии">
              <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
              </div>
              <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
              </div>
              <div class="qq-upload-button-selector qq-upload-button">
                <div>Загрузить</div>
              </div>
              <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
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
                    Retry
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
                  <button type="button" class="qq-cancel-button-selector">Close</button>
                </div>
              </dialog>

              <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                  <button type="button" class="qq-cancel-button-selector">No</button>
                  <button type="button" class="qq-ok-button-selector">Yes</button>
                </div>
              </dialog>

              <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                  <button type="button" class="qq-cancel-button-selector">Cancel</button>
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
          <script src="<?php echo $pathToCustom . '_static/js/fine-uploader-connect.js' ?>"></script>

        </section>
        <section class="la1-bottom-section">
          <label class="la1-terms-box">Даю согласие на обработку персональных данных
            <input required type="checkbox" id="la1-terms-checkbox" name="la1-terms-checkbox" class="la1-terms-checkbox">
            <span class="error-box error-la1-terms-checkbox"></span>
            <span class="checkmark"></span>
          </label>
          <div class="g-recaptcha" data-sitekey="6LdRaDMUAAAAAOwHA7zXiR1sAEbA2yQ9gwt7bbo0"></div>
          <button class="la1-submit" disabled type="submit">Отправить</button>
        </section>
      </form>
    </div>

    <script src="<?php echo $pathToCustom . '_static/js/for-ladies.js' ?>"></script>

  </div>

<?php get_footer();
