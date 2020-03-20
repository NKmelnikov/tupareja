<?php
/*
Template Name: Recommendation 2
*/
get_header();
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::instance()->version();
$pathToCustom = '/wp-content/themes/betheme/_Custom/';
?>
<link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/service/service.css?v=' . $v ?>">
<div class="rl2-wrapper rl-wrapper">
  <h1 class="rl-title"><?php _e('rec_title_2', 'betheme') ?></h1>
  <div class="rl-img-box">
    <img class="rl-image rl-image2" src="<?= $pathToCustom . '_static/img/recommendations/rec_4.jpg?v=' . $v ?>" alt="">
  </div>
  <article>
      <?php _e('rec_article_2', 'betheme') ?>
  </article>
</div>
<?php get_footer();
?>
