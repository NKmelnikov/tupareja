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
    <div class="mp1-image-container">
        <img src="<?php echo $lady['browser_path'];?>" alt="">
    </div>
<?php
}
?>
</div>

<?php
get_footer();
?>
