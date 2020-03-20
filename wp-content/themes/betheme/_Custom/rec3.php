<?php
/*
Template Name: Recommendation 3
*/
get_header();
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::instance()->version();
$pathToCustom = '/wp-content/themes/betheme/_Custom/';
?>
<link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/service/service.css?v=' . $v ?>">
<div class="rl3-wrapper rl-wrapper">
  <h1 class="rl-title"><?php _e('rec_title_3', 'betheme') ?></h1>
  <div class="rl-img-box">
    <img class="rl-image rl-image3" src="<?= $pathToCustom . '_static/img/recommendations/rec_3.jpg?v=' . $v ?>" alt="">
  </div>
  <article>
      <?php _e('rec_article_3', 'betheme') ?>
  </article>
</div>
<?php get_footer();
?>
