<?php
/*
Template Name: Recommendation 7
*/
get_header();
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::instance()->version();
$pathToCustom = '/wp-content/themes/betheme/_Custom/';
?>
<link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/service/service.css?v=' . $v ?>">
<div class="rm7-wrapper rm-wrapper">
  <h1 class="rm-title"><?php _e('rec_title_7', 'betheme') ?></h1>
  <div class="rm-img-box">
    <img class="rm-image rm-image7" src="<?= $pathToCustom . '_static/img/recommendations/rec_7.jpg?v=' . $v ?>" alt="">
  </div>
  <article>
      <?php _e('rec_article_7', 'betheme') ?>
  </article>
</div>
<?php get_footer();
?>
