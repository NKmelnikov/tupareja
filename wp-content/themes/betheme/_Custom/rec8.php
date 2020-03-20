<?php
/*
Template Name: Recommendation 8
*/
get_header();
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::instance()->version();
$pathToCustom = '/wp-content/themes/betheme/_Custom/';
?>
<link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/service/service.css?v=' . $v ?>">
<div class="rm8-wrapper rm-wrapper">
  <h1 class="rm-title"><?php _e('rec_title_8', 'betheme') ?></h1>
  <div class="rm-img-box">
    <img class="rm-image rm-image8" src="<?= $pathToCustom . '_static/img/recommendations/rec_8.jpg?v=' . $v ?>" alt="">
  </div>
  <article>
      <?php _e('rec_article_8', 'betheme') ?>
  </article>
</div>
<?php get_footer();
?>
