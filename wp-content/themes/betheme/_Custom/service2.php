<?php
/*
Template Name: Service 2
*/
get_header();
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::instance()->version();
$pathToCustom = '/wp-content/themes/betheme/_Custom/';
?>
<link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/service/service.css?v=' . $v ?>">
<div class="sp1-wrapper sp-wrapper">
  <h1 class="sp-title"><?php _e('service_title_2', 'betheme') ?></h1>
  <div class="sp-img-box">
    <img class="sp-image sp-image1" src="<?= $pathToCustom . '_static/img/service/service_2.jpg?v=' . $v ?>" alt="">
  </div>
  <article>
      <?php _e('service_article_2', 'betheme') ?>
  </article>
</div>
<?php get_footer();
?>
