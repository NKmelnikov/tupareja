<?php
/*
Template Name: for Men
*/
get_header();

$pathToCustom = '/wp-content/themes/betheme/_Custom/';
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::instance()->version();

?>
	<link rel="stylesheet" href="<?= $pathToCustom . '_static/fine-uploader/fine-uploader-new.min.css' ?>">
	<link rel="stylesheet" href="<?= $pathToCustom . '_static/fine-uploader/fine-uploader-gallery.min.css' ?>">
	<link rel="stylesheet" href="<?= $pathToCustom . '_static/fine-uploader/fine-uploader.min.css' ?>">
  <link rel="stylesheet" href="<?= $pathToCustom . '_static/libs/animate.css' ?>">
  <link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/men/men.css?v=' . $v ?>">
  <script src="<?= $pathToCustom . '_static/fine-uploader/dnd.min.js' ?>"></script>
  <script src="<?= $pathToCustom . '_static/libs/bootstrap.notify.min.js' ?>"></script>
  <script src="https://www.google.com/recaptcha/api.js"></script>

	<script src="<?= $pathToCustom . '_static/fine-uploader/jquery.fine-uploader.min.js' ?>"></script>
	<script src="<?= $pathToCustom . '_static/fine-uploader/fine-uploader.core.min.js' ?>"></script>
	<script src="<?= $pathToCustom . '_static/fine-uploader/fine-uploader.min.js' ?>"></script>
  <div id="Content" class="container">
    <div class="content_wrapper clearfix ">
      <article class="ma1-article">
        <p>
          El siguiente cuestionario es imprescindible para que lo conozcan las chicas
          que a usted le interesen. Con esto proporcionará una información fundamental
          para despertar el interés de las chicas. Rellene el cuestionario con toda la
          información sobre usted, aportando de 4 a 5 fotos claras, vestido de forma
          ocasional, de trabajo, deporte, por favor no fotos oscuras ni sin camiseta
          o camisa. Además rellene el apartado sobre su preferencia en la eleccion de
          la mujer. Toda esta información se tratará de forma confidencial para uso
          interno y sólo para las chicas que a usted le interese.
        </p>
      </article>
      <form action="<?php echo $pathToCustom . 'Actions/submitApplicationMan.php' ?>" class="ma1-wrapper" id="ma1-form" method="post" enctype="multipart/form-data">
        <section class="ma1-input-section">
          <div class="ma1-input-section__first-box">
            <input type="text" required name="ma1-name" id="ma1-name" min="2" max="255" class="ma1-input" placeholder=" Tu nombre">
            <span class="error-box error-ma1-name"></span>

	          <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" required name="ma1-dateOfBirth" id="ma1-dateOfBirth" maxlength="125" class="ma1-input" placeholder="Fecha de nacimiento">
	          <span class="error-box error-ma1-dateOfBirth"></span>

            <input type="email" required name="ma1-email" id="ma1-email" min="2" max="255" class="ma1-input" placeholder="Email">
            <span class="error-box error-ma1-email"></span>

            <input type="text" required name="ma1-phone" id="ma1-phone" min="2" max="255" class="ma1-input" placeholder="Número de teléfono">
            <span class="error-box error-ma1-phone"></span>

	          <!-- <input type="text" required name="ma1-country" id="ma1-country" min="2" max="255" class="ma1-input" placeholder="Страна">
	          <span class="error-box error-ma1-country"></span>-->


	          <input type="text" required name="ma1-education" id="ma1-education" min="2" max="255" class="ma1-input" placeholder="Educación (especialidad)">
	          <span class="error-box error-ma1-education"></span>

	          <input type="text" required name="ma1-profession" id="ma1-profession" min="2" max="255" class="ma1-input" placeholder="Profesión">
	          <span class="error-box error-ma1-profession"></span>

	          <input type="text" required name="ma1-familyStatus" id="ma1-familyStatus" min="2" max="255" class="ma1-input" placeholder="Estado civil">
	          <span class="error-box error-ma1-familyStatus"></span>

	          <input type="text" required name="ma1-kids" id="ma1-kids" min="2" max="255" class="ma1-input" placeholder="Niños (género y edad)">
	          <span class="error-box error-ma1-kids"></span>

	          <input type="text" required name="ma1-smoking" id="ma1-smoking" min="2" max="255" class="ma1-input" placeholder="¿Fumas?">
	          <span class="error-box error-ma1-smoking"></span>

	          <textarea rows="4" cols="50" required name="ma1-music_preferences" id="ma1-music_preferences" class="ma1-input" placeholder="Preferencias musicales*"></textarea>
	          <span class="error-box error-ma1-music_preferences"></span>

	          <textarea rows="4" cols="50" required name="ma1-literature" id="ma1-literature" class="ma1-input" placeholder="¿Lees literatura y qué género prefieres, también indica tu libro favorito*"></textarea>
	          <span class="error-box error-ma1-literature"></span>

	          <textarea rows="4" cols="50" required name="ma1-principles" id="ma1-principles" class="ma1-input" placeholder="¿Tienes principios / valores de vida estrictos que necesariamente deben coincidir con su pareja?*"></textarea>
	          <span class="error-box error-ma1-principles"></span>


	          <textarea rows="4" cols="50" required name="ma1-socially_active" id="ma1-socially_active" class="ma1-input" placeholder="¿Te consideras una persona socialmente activa o prefieres pasar tu tiempo libre en soledad / en un círculo cercano de conocidos?*"></textarea>
	          <span class="error-box error-ma1-socially_active "></span>

	          <textarea rows="4" cols="50" required name="ma1-vacation_preferences" id="ma1-vacation_preferences" class="ma1-input" placeholder="Durante sus vacaciones, que es preferible para usted: descansar en el mar, la soledad en un parque, bosque o montaña, un programa deexcursión activa*"></textarea>
	          <span class="error-box error-ma1-vacation_preferences"></span>



          </div>
	        <div class="ma1-input-section__second-box">
		        <input type="text" required name="ma1-town" id="ma1-town" min="2" max="255" class="ma1-input" placeholder="Dirección de residencia">
		        <span class="error-box error-ma1-town"></span>

		        <input type="text" required name="ma1-height" id="ma1-height" min="2" max="255" class="ma1-input" placeholder="Estatura (cm)">
		        <span class="error-box error-ma1-height"></span>

		        <input type="text" required name="ma1-weight" id="ma1-weight" min="2" max="255" class="ma1-input" placeholder="Peso (kg)">
		        <span class="error-box error-ma1-weight"></span>

		        <select required name="ma1-eyeColor" id="ma1-eyeColor"  class="ma1-input">
			        <option value="">Color de ojos*</option>
			        <option value="blue">Голубые</option>
			        <option value="hazel">Карие</option>
			        <option value="gray">Серые</option>
			        <option value="green">Зелёные</option>
		        </select>

		        <span class="error-box error-ma1-eyeColor"></span>

		        <input type="text" required name="ma1-heirColor" id="ma1-heirColor" min="2" max="255" class="ma1-input" placeholder="Color de pelo">
		        <span class="error-box error-ma1-heirColor"></span>

		        <input type="text" required name="ma1-enLanguage" id="ma1-enLanguage" min="2" max="255" class="ma1-input" placeholder="Conocimiento de inglés">
		        <span class="error-box error-ma1-enLanguage"></span>

		        <input type="text" required name="ma1-languages" id="ma1-languages" min="2" max="255" class="ma1-input" placeholder="Idioma adicional">
		        <span class="error-box error-ma1-languages"></span>

		        <input type="text" required name="ma1-hobby" id="ma1-hobby" min="2" max="255" class="ma1-input" placeholder="Aficiones/Hobbies">
		        <span class="error-box error-ma1-hobby"></span>

		        <input type="text" required name="ma1-drinking" id="ma1-drinking" min="2" max="255" class="ma1-input" placeholder="¿Bebes alcohol?">
		        <span class="error-box error-ma1-drinking"></span>

		        <textarea rows="4" cols="50" required name="ma1-people_value" id="ma1-people_value" class="ma1-input" placeholder="¿Qué es lo que más valoras en las personas?*"></textarea>
		        <span class="error-box error-ma1-people_value"></span>

		        <textarea rows="4" cols="50" required name="ma1-about" id="ma1-about" class="ma1-input" placeholder="Sobre mí*"></textarea>
		        <span class="error-box error-ma1-about"></span>

		        <textarea rows="4" cols="50" required name="ma1-parent_relations" id="ma1-parent_relations" class="ma1-input" placeholder="¿Cuál es tu relación con tus padres?*"></textarea>
		        <span class="error-box error-ma1-parent_relations"></span>

		        <textarea rows="4" cols="50" required name="ma1-goal" id="ma1-goal" class="ma1-input" placeholder="¿Tienes una meta en la vida que debe alcanzar*"></textarea>
		        <span class="error-box error-ma1-goal"></span>

		        <textarea rows="4" cols="50" required name="ma1-cuisine" id="ma1-cuisine" class="ma1-input" placeholder="¿Qué cocina prefieres / te gusta más?"></textarea>
		        <span class="error-box error-ma1-cuisine"></span>

	        </div>



        </section>
	    <section class="ma1-comoveas-section">
		    <h3>Como veas a tu pareja:</h3>
		    <div class="ma1-comoveas-wrap">
			    <div class="ma1-input-section__first-box">
				    <input type="text" required name="ma1-partner_age_difference" id="ma1-partner_age_difference" min="2" max="255" class="ma1-input" placeholder="diferencia máxima deedad">
				    <span class="error-box error-ma1-partner_age_difference"></span>

				    <input type="text" required name="ma1-partner_smoke" id="ma1-partner_smoke" min="2" max="255" class="ma1-input" placeholder="fumar">
				    <span class="error-box error-ma1-partner_smoke"></span>

				    <textarea rows="4" cols="50" required name="ma1-partner_drive_away" id="ma1-partner_drive_away" class="ma1-input" placeholder="Lo que puede alejarte en una pareja"></textarea>
				    <span class="error-box error-ma1-partner_drive_away"></span>



			    </div>
			    <div class="ma1-input-section__second-box">
				    <input type="text" required name="ma1-partner_kids" id="ma1-partner_kids" min="2" max="255" class="ma1-input" placeholder="con o sin hijos">
				    <span class="error-box error-ma1-partner_kids"></span>

				    <input type="text" required name="ma1-partner_religion" id="ma1-partner_religion" min="2" max="255" class="ma1-input" placeholder="actitud hacia la religión y la religión">
				    <span class="error-box error-ma1-partner_religion"></span>

				    <textarea rows="4" cols="50" required name="ma1-partner_attraction" id="ma1-partner_attraction" class="ma1-input" placeholder="Qué te puede atraer en una pareja"></textarea>
				    <span class="error-box error-ma1-partner_attraction"></span>

				    <input type="hidden" name="ma1-path-to-images" id="ma1-path-to-images">
			    </div>
		    </div>
	    </section>

	      <section class="ma1-uploader-section">
		      <!-- Fine Uploader Gallery template
		 ====================================================================== -->
		      <script type="text/template" id="qq-template-gallery">
			      <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Загрузите до 5 фоторафий">
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
		      <script src="<?php echo $pathToCustom . '_static/js/fine-uploader-connect.js?v=' . $v ?>"></script>

	      </section>


	      <section class="ma1-bottom-section">
          <div class="g-recaptcha" data-sitekey="6LdRaDMUAAAAAOwHA7zXiR1sAEbA2yQ9gwt7bbo0"></div>
          <button class="ma1-submit" type="submit">Отправить</button>
        </section>
      </form>
    </div>

    <script src="<?php echo $pathToCustom . '_static/js/for-men.js?v=' . $v ?>"></script>
  </div>

<?php get_footer();
