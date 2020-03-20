<?php
/*
Template Name: Contact
*/
get_header();

$pathToCustom = '/wp-content/themes/betheme/_Custom/';
require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
$v = \Helper\CustomHelper::instance()->version();

?>
<link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/contact/contact.css?v=' . $v ?>">

<div class="section mcb-section mcb-section-4f86e4c0c  full-width" style="">
  <div class="section_wrapper mcb-section-inner">
    <div class="wrap mcb-wrap mcb-wrap-4d609422d one  valign-top clearfix" style="">
      <div class="mcb-wrap-inner">
        <div class="column mcb-column mcb-item-543e6305d one column_image">
          <div class="image_frame image_item no_link scale-with-grid no_border">
            <div class="image_wrapper">
              <img class="scale-with-grid" src="<?= get_home_url() . '/wp-content/uploads/2018/11/model2-contact-main-bg.jpg'?>" alt="model2-contact-main-bg" title="model2-contact-main-bg" width="1860" height="851"/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section mcb-section mcb-section-1aa03e58c" style="padding-top:75px;padding-bottom:75px">
  <div class="section_wrapper mcb-section-inner">
    <div class="wrap mcb-wrap mcb-wrap-b04c9306a two-third  valign-top clearfix" style="">
      <div class="mcb-wrap-inner">
        <div class="column mcb-column mcb-item-5128cf457 one column_column">
          <div class="column_attr clearfix" style="">
            <h2>
              <b>International Matchmaking Office<br/>+ 38 050 1474440 / + 34 66 2426485</b>
            </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section mcb-section mcb-section-84c3b5aa5" style="">
  <div class="section_wrapper mcb-section-inner">
    <div class="wrap mcb-wrap mcb-wrap-affe5c47d one-third  valign-top clearfix" style="">
      <div class="mcb-wrap-inner">
        <div class="column mcb-column mcb-item-7c9a10fd2 one column_icon_box">
          <div class="icon_box icon_position_left no_border">
            <div class="image_wrapper">
              <img src="<?= get_home_url() . '/wp-content/uploads/2018/11/line3.png'?>" class="scale-with-grid" alt="line3" width="42" height="3"/>
            </div>
            <div class="desc_wrapper">
              <h5 class="title"><?php _e('contact_contact', 'betheme') ?></h5>
              <div class="desc">
                <p>
                  + 38 050 1474440<br/>+ 34 66 2426485<br>info@tuparejaucraniana.com
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="wrap mcb-wrap mcb-wrap-61b34fd00 one-third  valign-top clearfix" style="">
      <div class="mcb-wrap-inner">
        <div class="column mcb-column mcb-item-326e98db4 one column_icon_box">
          <div class="icon_box icon_position_left no_border">
            <div class="image_wrapper">
              <img src="<?= get_home_url() . '/wp-content/uploads/2018/11/line3.png'?>" class="scale-with-grid" alt="line3" width="42" height="3"/>
            </div>
            <div class="desc_wrapper">
              <h5 class="title"><?php _e('contact_address', 'betheme') ?></h5>
              <div class="desc">
                  <?php _e('contact_address_text', 'betheme') ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section mcb-section mcb-section-40a052506" style="padding-top:50px;padding-bottom:75px">
  <div class="section_wrapper mcb-section-inner">
    <div class="wrap mcb-wrap mcb-wrap-c753244eb one-third  valign-top clearfix" style="">
      <div class="mcb-wrap-inner">
        <div class="column mcb-column mcb-item-3b342c5e3 one column_column">
          <div class="column_attr clearfix" style="">
            <h3>
                <?php _e('contact_from_text', 'betheme') ?>
            </h3>
          </div>
        </div>
      </div>
    </div>
    <div class="wrap mcb-wrap mcb-wrap-a6cde3828 two-third  valign-top clearfix" style="padding:0 5%">
      <div class="mcb-wrap-inner">
        <div class="column mcb-column mcb-item-621eba013 one column_column">
          <div class="column_attr clearfix" style="">
            <div role="form" class="wpcf7" id="wpcf7-f85-p16-o1" lang="en-US" dir="ltr">
              <div class="screen-reader-response"></div>
              <form action="<?= $pathToCustom . 'Actions/sendContactFormEmail.php' ?>" method="post" class="wpcf7-form" novalidate="novalidate">
                <div style="display: none;">
                  <input type="hidden" name="_wpcf7" value="85"/>
                  <input type="hidden" name="_wpcf7_version" value="5.1.6"/>
                  <input type="hidden" name="_wpcf7_locale" value="en_US"/>
                  <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f85-p16-o1"/>
                  <input type="hidden" name="_wpcf7_container_post" value="16"/>
                </div>
                <div class="column one">
                  <label><span class="wpcf7-form-control-wrap your-name"><input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="<?php _e('contact_from_name', 'betheme') ?>"/></span>
                  </label>
                </div>
                <div class="column one-second">
                  <label style="margin-right:10px"><span class="wpcf7-form-control-wrap email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="<?php _e('contact_from_email', 'betheme') ?>"/></span></label>
                </div>
                <div class="column one-second">
                  <label><span class="wpcf7-form-control-wrap your-subject"><input type="text" name="subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="<?php _e('contact_from_subject', 'betheme') ?>"/></span></label>
                </div>
                <div class="column one">
                  <label><span class="wpcf7-form-control-wrap your-message"><textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="<?php _e('contact_from_message', 'betheme') ?>"></textarea></span>
                  </label>
                </div>
                <div class="column one">
                  <input type="submit" value="<?php _e('contact_from_submit', 'betheme') ?>" class="wpcf7-form-control wpcf7-submit button_full_width"/>
                </div>
                <div class="wpcf7-response-output wpcf7-display-none"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section the_content no_content">
  <div class="section_wrapper">
    <div class="the_content_wrapper"></div>
  </div>
</div>
<div class="section section-page-footer">
  <div class="section_wrapper clearfix">

    <div class="column one page-pager">
    </div>

  </div>
</div>
<?php
get_footer();
?>
