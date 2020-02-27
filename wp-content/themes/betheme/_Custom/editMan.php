<?php
require_once( explode( "wp-content" , __FILE__ )[0] . "wp-load.php" );
require_once 'Repository/ClientRepository.php';
use Repository\ClientRepository;
const TABLE_MEN = 'wp_men';

if(empty($_GET['customer']) && !is_numeric($_GET['customer'])){
    echo 'Man not found (';
    die();
}
$MenRepository = new ClientRepository();
$man = $MenRepository->getById(TABLE_MEN,$_GET['customer']);
$man = (array)$man[0];

if (!$man){
    echo 'Man not found (';
    die();
}

if(empty($_GET['_wpnonce'])){
  echo 'You are not allow to be here';
  die();
}
$pathToCustom = '/wp-content/themes/betheme/_Custom/';

?>
<link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/scss/men/menEdit.css">

<script src="/wp-content/themes/betheme/_Custom/_static/libs/bootstrap.notify.min.js"></script>


<form action="<?php echo $pathToCustom . 'Actions/submitUpdateMan.php' ?>" class="me1-wrapper" id="me1-form" method="post" enctype="multipart/form-data">
	<input type="hidden" name="me1-id" id="me1-id" value="<?php echo $_GET['customer']?>">
	<section class="me1_input_section">
    <div class="me1_input_section__first-box">
      <label for="me1-name">Ф.И.О</label>
      <input type="text" required name="me1-name" id="me1-name" min="2" max="255" class="me1-input" placeholder="Ф.И.О" value="<?php echo $man['name']; ?>">
      <span class="error-box error-me1-name"></span>
      <label for="me1-dateOfBirth">Дата рождения</label>
      <input type="text" required name="me1-dateOfBirth" id="me1-dateOfBirth" min="2" max="255" class="me1-input" placeholder="Дата рождения" value="<?php echo date('Y-m-d',$man['date_of_birth']); ?>">
      <span class="error-box error-me1-dateOfBirth"></span>
      <label for="me1-email">Email</label>
      <input type="email" required name="me1-email" id="me1-email" min="2" max="255" class="me1-input" placeholder="Email" value="<?php echo $man['email']; ?>">
      <span class="error-box error-me1-email"></span>
      <label for="me1-phone">Телефон</label>
      <input type="text" required name="me1-phone" id="me1-phone" min="2" max="255" class="me1-input" placeholder="Телефон" value="<?php echo $man['phone']; ?>">
      <span class="error-box error-me1-phone"></span>
	    <label for="me1-country">Страна</label>
	    <input type="text" required name="me1-country" id="me1-country" min="2" max="255" class="me1-input" placeholder="Страна" value="<?php echo $man['country']; ?>">
	    <span class="error-box error-me1-country"></span>
	    <label for="me1-town">Город</label>
	    <input type="text" required name="me1-town" id="me1-town" min="2" max="255" class="me1-input" placeholder="Город" value="<?php echo $man['town']; ?>">
	    <span class="error-box error-me1-town"></span>
    </div>
  </section>
  <section class="me1_bottom_section">
    <button class="me1_bottom_section__button-save" type="submit">Сохранить</button>
    <!-- <button class="le1_bottom_section__button-activate" type="button">Активировать</button> -->
  </section>
  <script src="<?php echo $pathToCustom . '_static/js/men-edit.js' ?>"></script>
</form>
