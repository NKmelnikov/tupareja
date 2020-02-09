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
$host = $_SERVER['SERVER_PROTOCOL'].$_SERVER['SERVER_NAME']
?>
  <link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/fine-uploader/fine-uploader.min.css">
  <link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/fine-uploader/fine-uploader-gallery.min.css">
  <link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/fine-uploader/fine-uploader-new.min.css">
<!--  <script src="/wp-content/themes/betheme/_Custom/_static/js/jquery-3.4.1.slim.min.js"></script>-->
  <script src="/wp-content/themes/betheme/_Custom/_static/fine-uploader/jquery.fine-uploader.min.js"></script>
  <script src="/wp-content/themes/betheme/_Custom/_static/fine-uploader/dnd.min.js"></script>
  <script src="/wp-content/themes/betheme/_Custom/_static/fine-uploader/fine-uploader.core.min.js"></script>
  <script src="/wp-content/themes/betheme/_Custom/_static/fine-uploader/fine-uploader.min.js"></script>
<div id="Content">
	<div class="content_wrapper clearfix">

		<?php get_sidebar(); ?>
    <form action="<?php echo $pathToCustom. 'Actions/submitApplication.php'?>" method="post" enctype="multipart/form-data">
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
        <input type="hidden" name="la1-path-to-images" id="la1-path-to-images">
        <input type="hidden" name="la1-main-image-path" id="la1-main-image-path">

      </section>
      <section class="la1-uploader-section">
        <!-- Fine Uploader Gallery template
   ====================================================================== -->
        <script type="text/template" id="qq-template-gallery">
          <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Drop files here">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
              <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
              <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="qq-upload-button-selector qq-upload-button">
              <div>Upload a file</div>
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
        <script src="<?php echo $pathToCustom. '_static/js/fine-uploader-connect.js'?>"></script>
      </section>
      <button type="submit">Отправить</button>
    </form>
	</div>
</div>

<?php get_footer();
