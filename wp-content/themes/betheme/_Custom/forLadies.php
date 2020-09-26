<?php
/*
Template Name: for Ladies
*/
switch_to_locale('ru_RU');
load_textdomain('betheme', 'wp-content/themes/betheme/languages/ru_RU.mo');
get_header();
$pathToCustom = '/wp-content/themes/betheme/_Custom/';
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::instance()->version();
?>
  <link rel="stylesheet" href="<?= $pathToCustom . '_static/fine-uploader/fine-uploader.min.css'?>">
  <link rel="stylesheet" href="<?= $pathToCustom . '_static/fine-uploader/fine-uploader-gallery.min.css'?>">
  <link rel="stylesheet" href="<?= $pathToCustom . '_static/fine-uploader/fine-uploader-new.min.css'?>">
  <link rel="stylesheet" href="<?= $pathToCustom . '_static/libs/animate.css'?>">
  <link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/ladies/ladies.css?v='.$v?>">

  <!--  <script src="<?= $pathToCustom . '_static/js/jquery-3.4.1.slim.min.js'?>"></script>-->
  <script src="<?= $pathToCustom . '_static/fine-uploader/jquery.fine-uploader.min.js'?>"></script>
  <script src="<?= $pathToCustom . '_static/fine-uploader/dnd.min.js'?>"></script>
  <script src="<?= $pathToCustom . '_static/fine-uploader/fine-uploader.core.min.js'?>"></script>
  <script src="<?= $pathToCustom . '_static/fine-uploader/fine-uploader.min.js'?>"></script>
  <script src="<?= $pathToCustom . '_static/libs/bootstrap.notify.min.js'?>"></script>
  <script src="<?= $pathToCustom . '_static/libs/jquery.maskedinput-1.2.2-co.min.js'?>"></script>
  <script src="<?= $pathToCustom . '_static/libs/imask.min.js'?>"></script>
  <script src="<?= $pathToCustom . '_static/libs/moment.min.js'?>"></script>

  <script src="https://www.google.com/recaptcha/api.js"></script>
  <div id="Content" class="container">
    <div class="content_wrapper clearfix ">

      <article class="la1-article">
        <p>Принципы работы</p>
        Живая встреча, свидание онлайн с переводчиком или бесперспективные переписки с мужчинами иностранцами в чатах знакомств?
        Мы ценим время каждого мужчины и девушки, которые к нам обратились. Деловой мужчина, не будет тратить своё время на длительные
        переписки, тем более в современном ритме жизни.
        Все наши мужчины, исключительно из Испании, поскольку наш центральный офис находится в г. Барселона и мы хорошо знаем характер,
        приоритеты, менталитет, язык, а также в каком регионе Испании, вам будет жить комфортнее и каждой девушке можем дать все необходимы
        рекомендации о том, какой он испанский мужчина, а также, как избежать типичных ошибок и как правильно интегрироваться в солнечную
        страну, где пахнет счастьем.
        С мужчинами мы проводим фундаментальное собеседование, проверяем его данные и переводим на русский язык.
        <br>
        <br>
        <ul>
          <li>
            После заполнения анкеты, наш модератор проверяет правильность
            заполнения ваших данных, качество фотографиий, а также делает
            перевод на испанский язык, конфиденциальность ваших  данных
            - основной приоритет в нашей работе.
          </li>
          <li>
            После размещения вашей анкеты на сайте ( или в закрытой базе данных,
            по вашему деланию), мы предлагаем ваше портфолио мужчинам, а также
            высылаем вам, через группу в приложении телеграм или по электронной
            почте, только тех мужчин, которые соответствуют вашим пожеланиям.
          </li>
          <li>
            Если вы друг другу понравитесь, мы организуем онлайн свидание с личным переводчиком
          </li>
          <li>
            В случае, если вы оба заинтересованы продолжать знакомства, на более серьезном уровне,
            по вашему желанию, мужчина приедет к вам Украину и мы организуем уже личную встречу,
            либо вы можете приехать а Испанию, все расходы по перелёту и размещению и пребыванию
            оплачивает мужчина, либо с вашего согласия мы передаём ваш контакт мужчине и
            вы самостоятельно организовываете вашу встречу.
          </li>
          <li>
            Как в Украине так и во время нахождения на территории Испании,
            у вас будет постоянный контакт с агенством, если возникнут какие-то вопросы.
          </li>
        </ul>
        <br>
        <p>
          Милые девушки, будьте открытыми и уверенными в себе, потому что вы лучшие!
        </p>
        International Matchmaking Office “Твоя испанская пара» организовывает ивенты знакомств с
        испанскими мужчинами в г. Киеве и в г. Барселона, а также проводит фотосессии в офисе
        агенства г. Киеве, о времени проведения данных мероприятий, будет объявлено дополнительно,
        подписывайтесь на наш аккаунт в Инстраграм Tvoya ispanskaya para и следите за всеми новостями,
        рекомендациями и реальной, интересной жизнью с испанским мужем.
        <br>
        <br>
        <p>Вся контактная информация, а также фамилия и полная дата рождения — строго конфиденциальны и не публикуются на сайте!</p>
        <p>Наши рекомендации по заполнению анкеты:</p>
	      <ul>
            <li>Выделите качества, которые делают вас особенной</li>
            <li>Расскажите подробно о своих увлечениях и хобби</li>
            <li>Укажите оригинальное жизненное кредо</li>
            <li>Опишите, какие качества Вы хотите видеть в своем избраннике</li>
            <li>Предоставляйте только реальную информацию (не скрывайте свой возраст либо наличие детей)</li>
            <li>Не используйте любые эмодзи 🥰 в тексте</li>
            <li>Прикрепите удачные фото, где можно хорошо рассмотреть Ваши черты лица и особенности фигуры (снимки не должны быть вульгарными)</li>
            <li>Не создавайте придуманного образа, несоответствие с ним может оттолкнуть мужчину</li>
		      <li>Сделайте коротенькое качественное видео, где можно увидеть вас в реальной жизни (формат <b>.mp4</b>)</li>
          <li>В видео расскажите немного о себе и какие ваши пожелания к партнеру, обязательно укажите что на сайте
            <b>tuparejaucraniana.com</b> <br>(произносится как [ту парэха украниана] в переводе с испанского языка - "Твоя украинская пара"),
            вы бы хотели найти своего мужчину. Видео может быть сделано на русском, английском или
            испанском языках, на каком вам более комфортно.
          </li>
          <li>Чем лучше  вы опишите себя и пожелания к партнёру, тем лучше мы сможем вас узнать и представить ваше портфолио мужчине</li>
          <li>Поля помеченные <b>*</b> являются обязательными</li>
        </ul>
        <br>
        <p>Наши рекомендации по подбору фото для анкеты.</p>
        <p>От правильного выбора фото, зависит ваш успех!!!
          Если у вас есть возможность, выделите для себя время и сделайте новые фото, специально для вашего портфолио, на сайте tuparejaucraniana.com</p>
        <br>
        <p>Не используйте фото:</p>
        <ul>
          <li>С искусственным освещением, темные или на мрачном фоне</li>
          <li>Где вы находитесь далеко, не на первом плане</li>
          <li>В солнезащитных очках</li>
          <li>С грустным, строгим или слишком серьезным выражением лица</li>
          <li>Селфи</li>
          <li>С другими людьми в кадре</li>
          <li>С фотошопом, который искажает вашу натуральную красоту</li>
          <li>В вечерних платьях и в слишком откровенной одежде</li>
          <li>Взгляд в сторону</li>
        </ul>
        <br>
        <p>Используйте фото:</p>
        <ul>
          <li>Нейтральный фон, на природе или в романтическом, нежном стиле</li>
          <li>Нужны портретные фото и фото в полный рост</li>
          <li>Ваши глаза должны излучать радость, счастье и положительный настрой</li>
          <li>Будьте улыбчивыми и жизнерадостыми – в этом ваша сила</li>
          <li>Прическа и легкий, нежный макияж обязательны, приложите максимум усилий, чтобы выглядеть на все 100</li>
          <li>Сделайте максимальное количество кадров и выберите 5-7 лучших</li>
        </ul>
        <br>
        <p>Милые девушки, мы проводим бесплатные фотосессии в нашем офисе, в г. Киеве, о времени их проведения, сообщаем в сторис Инстаграм, или на сайте tuparejaucraniana.com</p>

      </article>
      <form action="<?php echo $pathToCustom . 'Actions/submitApplicationLady.php' ?>" class="la1-wrapper" id="la1-form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="la1-locale" id="cf1-local" value="<?= get_locale() ?>"/>
        <section class="la1-input-section">
          <div class="la1-input-section__first-box">
            <div class="la1-name-container">
              <div class="la1-lname-box">
                <input type="text" required name="la1-lname" id="la1-lname" maxlength="125" class="la1-input" placeholder="Фамилия*">
                <span class="error-box error-la1-lname"></span>
              </div>
              <div class="la1-name-box">
                <input type="text" required name="la1-name" id="la1-name" maxlength="125" class="la1-input" placeholder="Имя*">
                <span class="error-box error-la1-name"></span>
              </div>
              <div class="la1-fname-box">
                <input type="text" name="la1-fname" id="la1-fname" maxlength="125" class="la1-input" placeholder="Отчество">
                <span class="error-box error-la1-fname"></span>
              </div>
            </div>
	
	          <div class="la1-dob-container">
		          <div class="la1-day-box">
			          <select required name="la1-day" id="la1-day"  class="la1-input">
				          <option value="">День*</option>
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
			          <span class="error-box error-la1-day"></span>
		          </div>
		
		          <div class="la1-month-box">
			          <select required name="la1-month" id="la1-month"  class="la1-input">
				          <option value="">Месяц*</option>
				          <option value="01">Январь</option>
				          <option value="02">Февраль</option>
				          <option value="03">Март</option>
				          <option value="04">Апрель</option>
				          <option value="05">Май</option>
				          <option value="06">Июнь</option>
				          <option value="07">Июль</option>
				          <option value="08">Август</option>
				          <option value="09">Сентябрь</option>
				          <option value="10">Октябрь</option>
				          <option value="11">Ноябрь</option>
				          <option value="12">Декабрь</option>
			          </select>
			          <span class="error-box error-la1-hairColor"></span>
		          </div>
		
		          <div class="la1-year-box">
			          <select required name="la1-year" id="la1-year" class="la1-input">
				          <option value="">Год рождения*</option>
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
			          <span class="error-box error-la1-hairColor"></span>
		          </div>
	          </div>

            <input type="email" required name="la1-email" id="la1-email" maxlength="125" class="la1-input" placeholder="Email*">
            <span class="error-box error-la1-email"></span>

            <input type="text" required name="la1-phone" id="la1-phone" maxlength="125" class="la1-input" placeholder="Телефон*">
            <span class="error-box error-la1-phone"></span>

            <input type="text" required name="la1-profession" id="la1-profession" maxlength="125" class="la1-input" placeholder="Профессия*">
            <span class="error-box error-la1-profession"></span>

            <input type="text" required name="la1-familyStatus" id="la1-familyStatus" maxlength="125" class="la1-input" placeholder="Семейное положение*">
            <span class="error-box error-la1-familyStatus"></span>

            <input type="text" required name="la1-kids" id="la1-kids" maxlength="125" class="la1-input" placeholder="Дети*">
            <span class="error-box error-la1-kids"></span>

            <textarea rows="4" cols="50" required name="la1-about" id="la1-about" class="la1-input" placeholder="О себе*"></textarea>
            <span class="error-box error-la1-about"></span>
          </div>
          <div class="la1-input-section__second-box">
            <input type="number" required name="la1-height" id="la1-height" maxlength="125" class="la1-input" placeholder="Рост (см)*">
            <span class="error-box error-la1-height"></span>

            <input type="number" required name="la1-weight" id="la1-weight" maxlength="125" class="la1-input" placeholder="Вес (кг)*">
            <span class="error-box error-la1-weight"></span>

            <div class="la1-color-container">
              <div class="la1-color-box">
                <select required name="la1-eyeColor" id="la1-eyeColor"  class="la1-input">
                  <option value="">Цвет глаз*</option>
                  <option value="blue">Голубой</option>
                  <option value="hazel">Карий</option>
                  <option value="gray">Серый</option>
                  <option value="green">Зелёный</option>
                  <option value="black">Чёрный</option>
                </select>
                <span class="error-box error-la1-eyeColor"></span>
              </div>

              <div class="la1-color-box">
                <select required name="la1-hairColor" id="la1-hairColor"  class="la1-input">
                  <option value="">Цвет волос*</option>
                  <option value="blond">Блондинка</option>
                  <option value="brunette">Брюнетка</option>
                  <option value="chestnut">Каштановый</option>
                  <option value="ginger">Рыжая</option>
                </select>
                <span class="error-box error-la1-hairColor"></span>
              </div>
            </div>


            <input type="text" required name="la1-town" id="la1-town" maxlength="125" class="la1-input" placeholder="Город*">
            <span class="error-box error-la1-town"></span>

            <input type="text" required name="la1-country" id="la1-country" maxlength="125" class="la1-input" placeholder="Страна*">
            <span class="error-box error-la1-country"></span>

            <input type="text" required name="la1-languages" id="la1-languages" maxlength="125" class="la1-input" placeholder="Иностранные языки и уровень владения*">
            <span class="error-box error-la1-languages"></span>

            <input type="text" name="la1-smoking" id="la1-smoking" maxlength="125" class="la1-input" placeholder="Курите ли Вы?">
            <span class="error-box error-la1-smoking"></span>

            <textarea rows="4" cols="50" name="la1-wishes-to-man" id="la1-wishes-to-man" class="la1-input" placeholder="Пожелания к потенциальному партнёру - например возраст, рост, цвет глаз и т.д."></textarea>
            <span class="error-box error-la1-wishes-to-man"></span>

            <input type="hidden" name="la1-path-to-images" id="la1-path-to-images">
            <input type="hidden" name="la1-main-image-path" id="la1-main-image-path">
          </div>

        </section>
        <section class="la1-uploader-section">
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
                <div>Загрузить*</div>
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
          <script src="<?php echo $pathToCustom . '_static/js/fine-uploader-connect.js?v='.$v ?> ?>"></script>

        </section>
        <section class="la1-bottom-section">
            <input type="button" id="la1-fake-file-input" value="Загрузить видео*" />
            <input type="file" accept="video/mp4" id="la1-video-upload" name="la1-video-upload" class="la1-input la1-video-upload">
            <span id="la1-fileName-text"></span>
            <span class="error-box error-la1-video-upload"></span>
	        <div id="upload-info"></div>
          <div class="g-recaptcha" data-sitekey="6LdRaDMUAAAAAOwHA7zXiR1sAEbA2yQ9gwt7bbo0"></div>
          <button class="la1-submit" disabled type="submit">Отправить</button>
        </section>
      </form>
    </div>

    <script src="<?php echo $pathToCustom . '_static/js/for-ladies.js?v='.$v ?>"></script>
  </div>

<?php get_footer();
