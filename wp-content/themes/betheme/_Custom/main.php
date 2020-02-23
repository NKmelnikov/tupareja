<?php
/*
Template Name: Main
*/
get_header();
require_once( explode( "wp-content" , __FILE__ )[0] . "wp-load.php" );
require_once 'Service/MainGalleryHandler.php';
use Service\MainGalleryHandler;

$galleryHandler = new MainGalleryHandler();
$ladies = $galleryHandler->getLadies();
?>
<link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/scss/main/main.css">
<h2>Галерея девушек</h2>
<div class="mp1-wrapper">

<?php
foreach ($ladies as $lady){
?>
  <a href="#">

  <section class="mp1-lady-container">

      <div class="mp1-image-container" style="background: url('<?php echo $lady['browser_path'];?>') no-repeat"></div>
      <div class="mp1-image-hover-container">
        <span class="mp1-image-hover-container__name"><?php echo $lady['name'];?></span>
        <span class="mp1-image-hover-container__divider"></span>
        <span class="mp1-image-hover-container__age"><b>Возраст:</b> <?php echo $lady['age'];?></span>
        <span class="mp1-image-hover-container__height"><b>Рост:</b> <?php echo $lady['height'];?></span>
        <span class="mp1-image-hover-container__profession"><b>Профессия:</b> <?php echo $lady['profession'];?></span>
      </div>
    </section>
  </a>

<?php
}
?>
</div>

<?php
get_footer();
?>
