<?php
require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
require_once 'Repository/ClientRepository.php';
require_once 'Helper/CustomHelper.php';

use Repository\ClientRepository;
use Helper\CustomHelper;

const TABLE_MEN = 'wp_men';

if (empty($_GET['customer']) && !is_numeric($_GET['customer'])) {
    echo 'Man not found (';
    die();
}
$MenRepository = new ClientRepository();
$man = $MenRepository->getById(TABLE_MEN, $_GET['customer']);
$man = (array)$man[0];

if (!$man) {
    echo 'Man not found (';
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
<link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/men/menEdit.css?v=' .$v ?>">
<script src="<?= $pathToCustom . '_static/libs/lightbox/js/lightbox.js?v=' .$v ?>"></script>


<form action="<?php echo $pathToCustom . 'Actions/submitUpdateMan.php' ?>" class="me1-wrapper" id="me1-form" method="post" enctype="multipart/form-data">
  <input type="hidden" name="me1-id" id="me1-id" value="<?php echo $_GET['customer'] ?>">
	<section class="me1-input-section">
		<div class="me1-input-section__first-box">
			<label for="me1-name"> Tu nombre</label>
			<input type="text" required name="me1-name" id="me1-name" min="2" max="255" class="me1-input" placeholder=" Tu nombre" value="<?php echo $man['name']; ?>">
			<span class="error-box error-me1-name"></span>

			<label for="me1-dateOfBirth"> Fecha de nacimiento</label>
			<input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" required name="me1-dateOfBirth" id="me1-dateOfBirth" maxlength="125" class="me1-input" placeholder="Fecha de nacimiento" value="<?php echo date('Y-m-d',$man['date_of_birth']); ?>">
			<span class="error-box error-me1-dateOfBirth"></span>

			<label for="me1-email"> Email</label>
			<input type="email" required name="me1-email" id="me1-email" min="2" max="255" class="me1-input" placeholder="Email" value="<?php echo $man['email']; ?>">
			<span class="error-box error-me1-email"></span>

			<label for="me1-phone"> Número de teléfono</label>
			<input type="text" required name="me1-phone" id="me1-phone" min="2" max="255" class="me1-input" placeholder="Número de teléfono" value="<?php echo $man['phone']; ?>">
			<span class="error-box error-me1-phone"></span>

			<!-- <input type="text" required name="me1-country" id="me1-country" min="2" max="255" class="me1-input" placeholder="Страна">
			<span class="error-box error-me1-country"></span>-->


			<label for="me1-education">Educación (especialidad)</label>
			<input type="text" required name="me1-education" id="me1-education" min="2" max="255" class="me1-input" placeholder="Educación (especialidad)" value="<?php echo $man['education']; ?>">
			<span class="error-box error-me1-education"></span>

			<label for="me1-profession">Profesión</label>
			<input type="text" required name="me1-profession" id="me1-profession" min="2" max="255" class="me1-input" placeholder="Profesión" value="<?php echo $man['profession']; ?>">
			<span class="error-box error-me1-profession"></span>

			<label for="me1-familyStatus">Estado civil</label>
			<input type="text" required name="me1-familyStatus" id="me1-familyStatus" min="2" max="255" class="me1-input" placeholder="Estado civil" value="<?php echo $man['family_status']; ?>">
			<span class="error-box error-me1-familyStatus"></span>

			<label for="me1-kids">Niños (género y edad)</label>
			<input type="text" required name="me1-kids" id="me1-kids" min="2" max="255" class="me1-input" placeholder="Niños (género y edad)" value="<?php echo $man['kids']; ?>">
			<span class="error-box error-me1-kids"></span>

			<label for="me1-smoking">¿Fumas?</label>
			<input type="text" required name="me1-smoking" id="me1-smoking" min="2" max="255" class="me1-input" placeholder="¿Fumas?" value="<?php echo $man['smoking']; ?>">
			<span class="error-box error-me1-smoking"></span>

			<label for="me1-music_preferences">Preferencias musicales*</label>
			<textarea rows="4" cols="50" required name="me1-music_preferences" id="me1-music_preferences" class="me1-input" placeholder="Preferencias musicales*"><?php echo $man['music_preferences']; ?></textarea>
			<span class="error-box error-me1-music_preferences"></span>

			<label for="me1-literature">¿Lees literatura y qué género prefieres, también indica tu libro favorito*</label>
			<textarea rows="4" cols="50" required name="me1-literature" id="me1-literature" class="me1-input" placeholder="¿Lees literatura y qué género prefieres, también indica tu libro favorito*"><?php echo $man['literature']; ?></textarea>
			<span class="error-box error-me1-literature"></span>

			<label for="me1-principles">¿Tienes principios / valores de vida estrictos que necesariamente deben coincidir con su pareja?*</label>
			<textarea rows="4" cols="50" required name="me1-principles" id="me1-principles" class="me1-input" placeholder="¿Tienes principios / valores de vida estrictos que necesariamente deben coincidir con su pareja?*"><?php echo $man['principles']; ?></textarea>
			<span class="error-box error-me1-principles"></span>

			<label for="me1-socially_active">¿Te consideras una persona socialmente activa o prefieres pasar tu tiempo libre en soledad / en un círculo cercano de conocidos?*</label>
			<textarea rows="4" cols="50" required name="me1-socially_active" id="me1-socially_active" class="me1-input" placeholder="¿Te consideras una persona socialmente activa o prefieres pasar tu tiempo libre en soledad / en un círculo cercano de conocidos?*"><?php echo $man['socially_active']; ?></textarea>
			<span class="error-box error-me1-socially_active "></span>

			<label for="me1-vacation_preferences">Durante sus vacaciones, que es preferible para usted: descansar en el mar, la soledad en un parque, bosque o montaña, un programa deexcursión activa*</label>
			<textarea rows="4" cols="50" required name="me1-vacation_preferences" id="me1-vacation_preferences" class="me1-input" placeholder="Durante sus vacaciones, que es preferible para usted: descansar en el mar, la soledad en un parque, bosque o montaña, un programa deexcursión activa*"><?php echo $man['vacation_preferences']; ?></textarea>
			<span class="error-box error-me1-vacation_preferences"></span>
		</div>
		<div class="me1-input-section__second-box">
			<label for="me1-town">Dirección de residencia</label>
			<input type="text" required name="me1-town" id="me1-town" min="2" max="255" class="me1-input" placeholder="Dirección de residencia" value="<?php echo $man['town']; ?>">
			<span class="error-box error-me1-town"></span>

			<label for="me1-height">Estatura (cm)</label>
			<input type="text" required name="me1-height" id="me1-height" min="2" max="255" class="me1-input" placeholder="Estatura (cm)" value="<?php echo $man['height']; ?>">
			<span class="error-box error-me1-height"></span>

			<label for="me1-weight">Peso (kg)</label>
			<input type="text" required name="me1-weight" id="me1-weight" min="2" max="255" class="me1-input" placeholder="Peso (kg)" value="<?php echo $man['weight']; ?>">
			<span class="error-box error-me1-weight"></span>

			<label for="me1-eyeColor">Color de ojos*</label>
			<input type="text" required name="me1-eyeColor" id="me1-eyeColor" min="2" max="255" class="me1-input" placeholder="Color de ojos*" value="<?php echo $customHelper->eyeColorMap($man['eye_color']); ?>">
			<span class="error-box error-me1-eyeColor"></span>

			<label for="me1-hairColor">Color de pelo</label>
			<input type="text" required name="me1-hairColor" id="me1-hairColor" min="2" max="255" class="me1-input" placeholder="Color de pelo" value="<?php echo $customHelper->hairColorMap($man['hair_color'], 'men'); ?>">
			<span class="error-box error-me1-heirColor"></span>

			<label for="me1-enLanguage">Conocimiento de inglés</label>
			<input type="text" required name="me1-enLanguage" id="me1-enLanguage" min="2" max="255" class="me1-input" placeholder="Conocimiento de inglés" value="<?php echo $man['eng_lang']; ?>">
			<span class="error-box error-me1-enLanguage"></span>

			<label for="me1-languages">Idioma adicional</label>
			<input type="text" required name="me1-languages" id="me1-languages" min="2" max="255" class="me1-input" placeholder="Idioma adicional" value="<?php echo $man['foreign_lang']; ?>">
			<span class="error-box error-me1-languages"></span>

			<label for="me1-hobby">Aficiones/Hobbies</label>
			<input type="text" required name="me1-hobby" id="me1-hobby" min="2" max="255" class="me1-input" placeholder="Aficiones/Hobbies" value="<?php echo $man['hobby']; ?>">
			<span class="error-box error-me1-hobby"></span>

			<label for="me1-drinking">¿Bebes alcohol?</label>
			<input type="text" required name="me1-drinking" id="me1-drinking" min="2" max="255" class="me1-input" placeholder="¿Bebes alcohol?" value="<?php echo $man['drinking']; ?>">
			<span class="error-box error-me1-drinking"></span>

			<label for="me1-people_value">¿Qué es lo que más valoras en las personas?*</label>
			<textarea rows="4" cols="50" required name="me1-people_value" id="me1-people_value" class="me1-input" placeholder="¿Qué es lo que más valoras en las personas?*"><?php echo $man['people_value']; ?></textarea>
			<span class="error-box error-me1-people_value"></span>

			<label for="me1-about">Sobre mí*</label>
			<textarea rows="4" cols="50" required name="me1-about" id="me1-about" class="me1-input" placeholder="Sobre mí*"><?php echo $man['about']; ?></textarea>
			<span class="error-box error-me1-about"></span>

			<label for="me1-parent_relations">¿Cuál es tu relación con tus padres?*</label>
			<textarea rows="4" cols="50" required name="me1-parent_relations" id="me1-parent_relations" class="me1-input" placeholder="¿Cuál es tu relación con tus padres?*"><?php echo $man['parent_relations']; ?></textarea>
			<span class="error-box error-me1-parent_relations"></span>

			<label for="me1-goal">¿Tienes una meta en la vida que debe alcanzar*</label>
			<textarea rows="4" cols="50" required name="me1-goal" id="me1-goal" class="me1-input" placeholder="¿Tienes una meta en la vida que debe alcanzar*"><?php echo $man['goal']; ?></textarea>
			<span class="error-box error-me1-goal"></span>

			<label for="me1-cuisine">¿Qué cocina prefieres / te gusta más?</label>
			<textarea rows="4" cols="50" required name="me1-cuisine" id="me1-cuisine" class="me1-input" placeholder="¿Qué cocina prefieres / te gusta más?"><?php echo $man['cuisine']; ?></textarea>
			<span class="error-box error-me1-cuisine"></span>

		</div>



	</section>
	<section class="me1-comoveas-section">
		<h3>Como veas a tu pareja:</h3>
		<div class="me1-comoveas-wrap">
			<div class="me1-input-section__first-box">
				<label for="me1-partner_age_difference">diferencia máxima deedad</label>
				<input type="text" required name="me1-partner_age_difference" id="me1-partner_age_difference" min="2" max="255" class="me1-input" placeholder="diferencia máxima deedad" value="<?php echo $man['partner_age_difference']; ?>">
				<span class="error-box error-me1-partner_age_difference"></span>

				<label for="me1-partner_smoke">fumar</label>
				<input type="text" required name="me1-partner_smoke" id="me1-partner_smoke" min="2" max="255" class="me1-input" placeholder="fumar" value="<?php echo $man['partner_smoke']; ?>">
				<span class="error-box error-me1-partner_smoke"></span>

				<label for="me1-partner_drive_away">Lo que puede alejarte en una pareja</label>
				<textarea rows="4" cols="50" required name="me1-partner_drive_away" id="me1-partner_drive_away" class="me1-input" placeholder="Lo que puede alejarte en una pareja"><?php echo $man['partner_drive_away']; ?></textarea>
				<span class="error-box error-me1-partner_drive_away"></span>



			</div>
			<div class="me1-input-section__second-box">
				<label for="me1-partner_kids">con o sin hijos</label>
				<input type="text" required name="me1-partner_kids" id="me1-partner_kids" min="2" max="255" class="me1-input" placeholder="con o sin hijos" value="<?php echo $man['partner_kids']; ?>">
				<span class="error-box error-me1-partner_kids"></span>

				<label for="me1-partner_religion">actitud hacia la religión y la religión</label>
				<input type="text" required name="me1-partner_religion" id="me1-partner_religion" min="2" max="255" class="me1-input" placeholder="actitud hacia la religión y la religión" value="<?php echo $man['partner_religion']; ?>">
				<span class="error-box error-me1-partner_religion"></span>

				<label for="me1-partner_attraction">Qué te puede atraer en una pareja</label>
				<textarea rows="4" cols="50" required name="me1-partner_attraction" id="me1-partner_attraction" class="me1-input" placeholder="Qué te puede atraer en una pareja"><?php echo $man['partner_attraction']; ?></textarea>
				<span class="error-box error-me1-partner_attraction"></span>

				<label for="me1-path-to-images">Пути к фотографиям</label>
				<textarea rows="4" cols="50" type="text" name="me1-path-to-images" id="me1-path-to-images"><?php echo $man['path_to_images']; ?></textarea>
				<span class="error-box error-me1-path-to-images"></span>

			</div>
		</div>
	</section>

	<section class="me1_photo_section">
		<?php
		$pathArray = explode(',',$man['path_to_images']);

		foreach ($pathArray as $image){
			$image = str_replace(ABSPATH, get_home_url() . '/', $image);
			?>
      <a href="<?php echo $image; ?>" data-path="<?= $image ?>" data-lightbox="roadtrip">
        <img src="<?php echo $image; ?>" class="le1-lady-image <?= $image ?>" alt="lady image">
      </a>
			<?php
		}

		?>
	</section>
  <section class="me1_bottom_section">
    <button class="me1_bottom_section__button-save" type="submit">Сохранить</button>
    <!-- <button class="le1_bottom_section__button-activate" type="button">Активировать</button> -->
  </section>
  <script src="<?php echo $pathToCustom . '_static/libs/bootstrap.notify.min.js'?>"></script>
  <script src="<?php echo $pathToCustom . '_static/js/men-edit.js?v='.$v ?>"></script>
</form>
