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
	<script src="<?= $pathToCustom . '_static/libs/imask.min.js'?>"></script>
	<script src="<?= $pathToCustom . '_static/libs/moment.min.js'?>"></script>
  <script src="https://www.google.com/recaptcha/api.js"></script>

  <script src="<?= $pathToCustom . '_static/fine-uploader/jquery.fine-uploader.min.js' ?>"></script>
  <script src="<?= $pathToCustom . '_static/fine-uploader/fine-uploader.core.min.js' ?>"></script>
  <script src="<?= $pathToCustom . '_static/fine-uploader/fine-uploader.min.js' ?>"></script>
  <div id="Content" class="container">
    <div class="content_wrapper clearfix ">
      <article class="ma1-article">
        <h4>Condiciones para iniciar la búsqueda de una chica </h4>
        <ol>
          <li>Al inicio del procedimiento el cliente tiene que rellenar formulario en la página web de La agencia https://tuparejaucraniana.com/men-application/, presentando la máxima información posible sobre usted y preferencia en la elección de la mujer (edad, apariencia, carácter, prioridades, etc). Con esto proporcionará una información fundamental para despertar el interés de las chicas.</li>
          <li>El cliente debe adjuntar fotos claras suyas (como mínimo cuatro, recientes o máximo del ultimo año, sin gafas, donde se ve bien el rostro y el cuerpo entero, vestido de forma ocasional, de trabajo, deporte, por favor no fotos oscuras, ni sin camisetas) en el mismo formulario y también una foto de su DNI para confirmar el nombre, apellidos, edad. Toda esta información se tratará de forma confidencial para uso interno.</li>
          <li>
            Una vez la información y datos recibidos por parte del cliente, sean validados por la agencia, deberá abonar una de las cuotas de socio eligidas con el servicio incluido que ofrece La agencia.
          </li>
          <li>
            El objeto del contrato es el asesoramiento para conocer a una mujer del catálogo de la página web https://tuparejaucraniana.com/ o una mujer recomendada por la Agencia que no está en el catálogo que mejor encaje con su perfil, con la cual el cliente muestre afinidad, así como la organización de citas online con el traductor personalizado, organización del viaje a España de la mujer o el viaje a Ucrania del cliente para conocer a la mujer elegida o tener opción conocer varias mujeres.
          </li>
          <li>
            El éxito del encuentro y el posterior inicio de una relación dependen exclusivamente del hombre y la mujer, y es por ello que La agencia no se responsabiliza en ningún caso del resultado posterior ni de la durabilidad de la misma.
          </li>
          <li>
            La fundadora de La agencia se reserva el derecho de no aceptar como cliente a cualquier persona sin necesidad de justificar dicha decisión.
          </li>
        </ol>
        <h5>Packs</h5>
        <p>
          Los packs se basan en nuestra forma habitual de trabajo, incluyendo, en primer lugar, un dialogo exploratorio y una entrevista de adhesión en profundidad, evaluación y elaboración del perfil y un dedicado gerente de relaciones para sus presentaciones, seguimiento y guía, colaborando con usted durante todo su paso. La comunicación regular a lo largo del proceso se realiza por teléfono, correo electrónico y mensajes de texto.
          Le daremos consejos prácticos sobre lo que usted debe o no debe hacer en cada etapa de su búsqueda del principio al fin, le explicaremos cuales son los errores mas comunes que cometen los hombres y qué es lo que busca una mujer ucraniana en un hombre basándonos en nuestra propia experiencia
        </p>
        <h5>
          Pack Mini
        </h5>
        <ul>
          <li>
            Primera selección de no menos de 10 perfiles de mujeres recomendadas.
          </li>
          <li>
            Primera cita online - videollamada gratuita con la mujer finalmente elegida.
          </li>
          <li>
            Cuota única de inscripción de 180 EUR
          </li>
        </ul>
        <h5>
          Pack Medio
        </h5>
        <ul>
          <li>
            Primera selección de no menos de 15 perfiles de mujeres recomendadas.
          </li>
          <li>
            Tres citas online - videollamadas gratuitas con las mujeres finalmente elegidas.
          </li>
          <li>
            Cuota única de inscripción de 300 EUR
          </li>
        </ul>
        <h5>
          Pack Maxi
        </h5>
        <ul>
          <li>
            Primera selección de no menos de 20 perfiles de mujeres recomendadas.
          </li>
          <li>
            Cinco citas online - videollamadas gratuitas con las mujeres finalmente elegidas.
          </li>
          <li>
            El número de teléfono privado de la mujer finalmente elegida, así como un descuento en el precio de invitación a España de esta misma mujer, no otra.
          </li>
          <li>
            Este descuento será de 100 EUR
          </li>
          <li>
            Cuota única de inscripción de 450 EUR
          </li>
          <li>
            A continuación, usted va a poder elegir como quiere conocer a su mujer personalmente entre invitar a España o viaje a Ucrania.
          </li>
        </ul>


      </article>
      <form action="<?php echo $pathToCustom . 'Actions/submitApplicationMan.php' ?>" class="ma1-wrapper" id="ma1-form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="ma1-locale" id="cf1-local" value="<?= get_locale() ?>"/>
        <section class="ma1-input-section">
          <div class="ma1-input-section__first-box">
            <input type="text" required name="ma1-name" id="ma1-name"  maxlength="255" class="ma1-input" placeholder=" Tu nombre">
            <span class="error-box error-ma1-name"></span>
	
	          <div class="ma1-dob-container">
		          <div class="ma1-day-box">
			          <select required name="ma1-day" id="ma1-day"  class="ma1-input">
				          <option value="">Día*</option>
				          <option value="1">1</option>
				          <option value="2">2</option>
				          <option value="3">3</option>
				          <option value="4">4</option>
				          <option value="5">5</option>
				          <option value="6">6</option>
				          <option value="7">7</option>
				          <option value="8">8</option>
				          <option value="9">9</option>
				          <option value="10">10</option>
				          <option value="11">11</option>
				          <option value="12">12</option>
				          <option value="13">13</option>
				          <option value="14">14</option>
				          <option value="15">15</option>
				          <option value="16">16</option>
				          <option value="17">17</option>
				          <option value="18">18</option>
				          <option value="19">19</option>
				          <option value="20">20</option>
				          <option value="21">21</option>
				          <option value="22">22</option>
				          <option value="23">23</option>
				          <option value="24">24</option>
				          <option value="25">25</option>
				          <option value="26">26</option>
				          <option value="27">27</option>
				          <option value="28">28</option>
				          <option value="29">29</option>
				          <option value="30">30</option>
				          <option value="31">31</option>
			          </select>
			          <span class="error-box error-ma1-day"></span>
		          </div>
		
		          <div class="ma1-month-box">
			          <select required name="ma1-month" id="ma1-month"  class="ma1-input">
				          <option value="">Mes*</option>
				          <option value="01">Enero</option>
				          <option value="02">Febrero</option>
				          <option value="03">Marzo</option>
				          <option value="04">Abril</option>
				          <option value="05">Mayo</option>
				          <option value="06">Junio</option>
				          <option value="07">Julio</option>
				          <option value="08">Agosto</option>
				          <option value="09">Septiembre</option>
				          <option value="10">Octubre</option>
				          <option value="11">Noviembre</option>
				          <option value="12">Diciembre</option>
			          </select>
			          <span class="error-box error-ma1-hairColor"></span>
		          </div>
		
		          <div class="ma1-year-box">
			          <select required name="ma1-year" id="ma1-year" class="ma1-input">
				          <option value="">Año de nacimiento*</option>
				          <option value="2020">2020</option>
				          <option value="2019">2019</option>
				          <option value="2018">2018</option>
				          <option value="2017">2017</option>
				          <option value="2016">2016</option>
				          <option value="2015">2015</option>
				          <option value="2014">2014</option>
				          <option value="2013">2013</option>
				          <option value="2012">2012</option>
				          <option value="2011">2011</option>
				          <option value="2010">2010</option>
				          <option value="2009">2009</option>
				          <option value="2008">2008</option>
				          <option value="2007">2007</option>
				          <option value="2006">2006</option>
				          <option value="2005">2005</option>
				          <option value="2004">2004</option>
				          <option value="2003">2003</option>
				          <option value="2002">2002</option>
				          <option value="2001">2001</option>
				          <option value="2000">2000</option>
				          <option value="1999">1999</option>
				          <option value="1998">1998</option>
				          <option value="1997">1997</option>
				          <option value="1996">1996</option>
				          <option value="1995">1995</option>
				          <option value="1994">1994</option>
				          <option value="1993">1993</option>
				          <option value="1992">1992</option>
				          <option value="1991">1991</option>
				          <option value="1990">1990</option>
				          <option value="1989">1989</option>
				          <option value="1988">1988</option>
				          <option value="1987">1987</option>
				          <option value="1986">1986</option>
				          <option value="1985">1985</option>
				          <option value="1984">1984</option>
				          <option value="1983">1983</option>
				          <option value="1982">1982</option>
				          <option value="1981">1981</option>
				          <option value="1980">1980</option>
				          <option value="1979">1979</option>
				          <option value="1978">1978</option>
				          <option value="1977">1977</option>
				          <option value="1976">1976</option>
				          <option value="1975">1975</option>
				          <option value="1974">1974</option>
				          <option value="1973">1973</option>
				          <option value="1972">1972</option>
				          <option value="1973">1973</option>
				          <option value="1972">1972</option>
				          <option value="1971">1971</option>
				          <option value="1970">1970</option>
				          <option value="1969">1969</option>
				          <option value="1968">1968</option>
				          <option value="1967">1967</option>
				          <option value="1966">1966</option>
				          <option value="1965">1965</option>
				          <option value="1964">1964</option>
				          <option value="1963">1963</option>
				          <option value="1962">1962</option>
				          <option value="1961">1961</option>
				          <option value="1960">1960</option>
				          <option value="1959">1959</option>
				          <option value="1958">1958</option>
				          <option value="1957">1957</option>
				          <option value="1956">1956</option>
				          <option value="1955">1955</option>
				          <option value="1954">1954</option>
				          <option value="1953">1953</option>
				          <option value="1952">1952</option>
				          <option value="1951">1951</option>
				          <option value="1950">1950</option>
			          </select>
			          <span class="error-box error-ma1-hairColor"></span>
		          </div>
	          </div>

            <input type="email" required name="ma1-email" id="ma1-email"  maxlength="255" class="ma1-input" placeholder="Email">
            <span class="error-box error-ma1-email"></span>

            <input type="text" required name="ma1-phone" id="ma1-phone"  maxlength="255" class="ma1-input" placeholder="Número de teléfono">
            <span class="error-box error-ma1-phone"></span>

            <!-- <input type="text" required name="ma1-country" id="ma1-country"  maxlength="255" class="ma1-input" placeholder="Страна">
              <span class="error-box error-ma1-country"></span>-->


            <input type="text" required name="ma1-education" id="ma1-education"  maxlength="255" class="ma1-input" placeholder="Educación (especialidad)">
            <span class="error-box error-ma1-education"></span>

            <input type="text" required name="ma1-profession" id="ma1-profession"  maxlength="255" class="ma1-input" placeholder="Profesión">
            <span class="error-box error-ma1-profession"></span>

            <input type="text" required name="ma1-familyStatus" id="ma1-familyStatus"  maxlength="255" class="ma1-input" placeholder="Estado civil">
            <span class="error-box error-ma1-familyStatus"></span>

            <input type="text" required name="ma1-kids" id="ma1-kids"  maxlength="255" class="ma1-input" placeholder="Niños (género y edad)">
            <span class="error-box error-ma1-kids"></span>

            <input type="text" required name="ma1-smoking" id="ma1-smoking"  maxlength="255" class="ma1-input" placeholder="¿Fumas?">
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
            <input type="text" required name="ma1-town" id="ma1-town"  maxlength="255" class="ma1-input" placeholder="Dirección de residencia">
            <span class="error-box error-ma1-town"></span>

            <input type="text" required name="ma1-height" id="ma1-height"  maxlength="255" class="ma1-input" placeholder="Estatura (cm)">
            <span class="error-box error-ma1-height"></span>

            <input type="text" required name="ma1-weight" id="ma1-weight"  maxlength="255" class="ma1-input" placeholder="Peso (kg)">
            <span class="error-box error-ma1-weight"></span>
            <select required name="ma1-eyeColor" id="ma1-eyeColor" class="ma1-input">
              <option value="">Color de los ojos</option>
              <option value="blue">Azules</option>
              <option value="hazel">Marrónes</option>
              <option value="gray">Grises</option>
              <option value="green">Verdes</option>
              <option value="black">Negros</option>
            </select>
            <span class="error-box error-ma1-eyeColor"></span>
            <select required name="ma1-hairColor" id="ma1-hairColor" class="ma1-input">
              <option value="">Color del cabello</option>
              <option value="blond">Rubio</option>
              <option value="brunette">Moreno</option>
              <option value="chestnut">Castaño</option>
              <option value="ginger">Pelirrojo</option>
            </select>
            <span class="error-box error-ma1-hairColor"></span>

            <input type="text" required name="ma1-enLanguage" id="ma1-enLanguage"  maxlength="255" class="ma1-input" placeholder="Conocimiento de inglés">
            <span class="error-box error-ma1-enLanguage"></span>

            <input type="text" required name="ma1-languages" id="ma1-languages"  maxlength="255" class="ma1-input" placeholder="Idioma adicional">
            <span class="error-box error-ma1-languages"></span>

            <input type="text" required name="ma1-hobby" id="ma1-hobby"  maxlength="255" class="ma1-input" placeholder="Aficiones/Hobbies">
            <span class="error-box error-ma1-hobby"></span>

            <input type="text" required name="ma1-drinking" id="ma1-drinking"  maxlength="255" class="ma1-input" placeholder="¿Bebes alcohol?">
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
          <h3>Como ves a tu pareja:</h3>
          <div class="ma1-comoveas-wrap">
            <div class="ma1-input-section__first-box">
              <input type="text" required name="ma1-partner_age_difference" id="ma1-partner_age_difference"  maxlength="255" class="ma1-input" placeholder="diferencia máxima de edad">
              <span class="error-box error-ma1-partner_age_difference"></span>

              <input type="text" required name="ma1-partner_smoke" id="ma1-partner_smoke"  maxlength="255" class="ma1-input" placeholder="fumar">
              <span class="error-box error-ma1-partner_smoke"></span>

              <textarea rows="4" cols="50" required name="ma1-partner_drive_away" id="ma1-partner_drive_away" class="ma1-input" placeholder="Lo que puede alejarte en una pareja"></textarea>
              <span class="error-box error-ma1-partner_drive_away"></span>


            </div>
            <div class="ma1-input-section__second-box">
              <input type="text" required name="ma1-partner_kids" id="ma1-partner_kids"  maxlength="255" class="ma1-input" placeholder="con o sin hijos">
              <span class="error-box error-ma1-partner_kids"></span>

              <input type="text" required name="ma1-partner_religion" id="ma1-partner_religion"  maxlength="255" class="ma1-input" placeholder="actitud hacia la religión y la religión">
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
            <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Sube hasta 5 fotos">
              <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
              </div>
              <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
              </div>
              <div class="qq-upload-button-selector qq-upload-button">
                <div>Subir</div>
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
                    Reintentar
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
                  <button type="button" class="qq-cancel-button-selector">Cerrar</button>
                </div>
              </dialog>

              <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                  <button type="button" class="qq-cancel-button-selector">Pero</button>
                  <button type="button" class="qq-ok-button-selector">Si</button>
                </div>
              </dialog>

              <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                  <button type="button" class="qq-cancel-button-selector">Cancelar</button>
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
          <button class="ma1-submit" disabled type="submit">Enviar</button>
        </section>
      </form>
    </div>

    <script src="<?php echo $pathToCustom . '_static/js/for-men.js?v=' . $v ?>"></script>
  </div>

<?php get_footer();
