<?php
/*
Template Name: Our Services
*/
get_header();
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::instance()->version();
$pathToCustom = '/wp-content/themes/betheme/_Custom/';
?>

<link rel="stylesheet" href="<?= $pathToCustom .'_static/scss/service/service.css?v='.$v ?>">
<main class="os1-wrapper">
  <section class="paralax-box">
    <div class="paralax-box__image"></div>
    <div class="paralax-box__border"></div>
  </section>
</main>

