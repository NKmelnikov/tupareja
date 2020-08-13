<?php
/*
Template Name: Recommendation 1
*/
switch_to_locale('ru_RU');
load_textdomain('betheme', 'wp-content/themes/betheme/languages/ru_RU.mo');
get_header();
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::instance()->version();
$pathToCustom = '/wp-content/themes/betheme/_Custom/';
?>
<link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/service/service.css?v=' . $v ?>">
<div class="rl1-wrapper rl-wrapper">
  <h1 class="rl-title"><?php _e('rec_title_1', 'betheme') ?></h1>
  <div class="rl-img-box">
    <img class="rl-image rl-image1" src="<?= $pathToCustom . '_static/img/recommendations/rec_6.png?v=' . $v ?>" alt="">
  </div>
  <article>
      <?php _e('rec_article_1', 'betheme') ?>
  </article>
</div>
<?php get_footer();
?>
