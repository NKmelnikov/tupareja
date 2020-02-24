<?php
/*
Template Name: Main
*/
get_header();

$pathToCustom = '/wp-content/themes/betheme/_Custom/';

?>
<link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/scss/main/main.css">
<script src="/wp-content/themes/betheme/_Custom/_static/libs/pagination.min.js"></script>
<script src="/wp-content/themes/betheme/_Custom/_static/libs/jquery-ui.min.js"></script>

<h2>Галерея девушек</h2>
<div class="mp1-wrapper"></div>
<div class="mp1-lower-section">
  <div id="pagination"></div>
  <div id="accordion">
    <h6>Расширенный поиск</h6>
    <form id="mp1-ds-form" action="">
      <section class="mp1-ds-age-section">
        <span>Возраст</span>
        <label for="mp1-ds-age-from">От</label>
        <input id="mp1-ds-age-from" name="mp1-ds-age-from" type="text">
        <label for="mp1-ds-age-to">До</label>
        <input for="mp1-ds-age-to" name="mp1-ds-age-to" type="text">
      </section>
      <section class="mp1-ds-height-section">
        <span>Рост</span>
        <label for="mp1-ds-height-from">От</label>
        <input id="mp1-ds-height-from" name="mp1-ds-height-from" type="text">
        <label for="mp1-ds-height-to">До</label>
        <input for="mp1-ds-height-to" name="mp1-ds-height-to" type="text">
      </section>
      <section class="mp1-ds-weight-section">
        <span>Вес</span>
        <label for="mp1-ds-weight-from">От</label>
        <input id="mp1-ds-weight-from" name="mp1-ds-weight-from" type="text">
        <label for="mp1-ds-weight-to">До</label>
        <input for="mp1-ds-weight-to" name="mp1-ds-weight-to" type="text">
      </section>
      <section class="mp1-ds-weight-section">
        <span>Цвет глаз</span>
        <label for="mp1-ds-eyes-blue">Голубые</label>
        <input id="mp1-ds-eyes-blue" name="mp1-ds-eyes-blue" type="checkbox">
        <label for="mp1-ds-eyes-hazel">Карьи</label>
        <input id="mp1-ds-eyes-hazel" name="mp1-ds-eyes-hazel" type="checkbox">
        <label for="mp1-ds-eyes-gray">Серые</label>
        <input id="mp1-ds-eyes-gray" name="mp1-ds-eyes-gray" type="checkbox">
        <label for="mp1-ds-eyes-green">Зелёные</label>
        <input id="mp1-ds-eyes-green" name="mp1-ds-eyes-green" type="checkbox">
      </section>
    </form>
  </div>
</div>

<script src="<?php echo $pathToCustom . '_static/js/main-gallery-handler.js' ?>"></script>
<?php
get_footer();
?>
