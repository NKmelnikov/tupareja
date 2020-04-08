<?php
/*
Template Name: forPerson
*/

require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';

use Repository\ClientRepository;
use Helper\CustomHelper;

get_header('person');
$clientRepository = new ClientRepository();
$person = $clientRepository->getById(TABLE_LADIES, $_GET['id']);
$pathToCustom = '/wp-content/themes/betheme/_Custom/';

CustomHelper::build();
$customHelper = CustomHelper::instance();
$v = $customHelper->version();
?>
  <link rel="stylesheet" href="<?= $pathToCustom . '_static/scss/person/person.css?v=' . $v ?>">
  <script language="JavaScript">
      document.oncontextmenu =new Function("return false;")
  </script>

  <div id="Content" class="noselect container">
    <div class="content_wrapper clearfix ">

      <section class="pr1-lvl1-wrap pr1-wrap">
        <div class="left">
          <img width="300" src="<?php echo $customHelper->convertImgPath($person[0]->main_image_path); ?>" alt="<?php echo $person[0]->name; ?>">
        </div>
        <div class="right">
          <ul>
            <li>
              <span class="pr1-person-title"><?php _e('contact_from_name', 'betheme') ?>:</span> <span class="pr1-person-info"><?php echo $person[0]->name; ?></span>
            </li>
            <li>
              <span class="pr1-person-title">ID:</span> <?php echo $person[0]->id; ?>
            </li>
            <li>
              <span class="pr1-person-title"><?php _e('search_age', 'betheme') ?>:</span> <span class="pr1-person-info"><?php echo $customHelper->getCurrentAge($person[0]->date_of_birth) ?></span>
            </li>
            <li>
              <span class="pr1-person-title"><?php _e('search_zodiac', 'betheme') ?>:</span> <span class="pr1-person-info"><?php _e('search_zodiac_'.$customHelper->getZodiac($person[0]->date_of_birth), 'betheme')  ?></span>
            </li>
            <li>
              <span class="pr1-person-title"><?php _e('person_country', 'betheme') ?>:</span> <span class="pr1-person-info"><?php echo $person[0]->country; ?></span>
            </li>
            <li>
              <span class="pr1-person-title"><?php _e('person_town', 'betheme') ?>:</span> <span class="pr1-person-info"><?php echo $person[0]->town; ?></span>
            </li>
            <li>
              <span class="pr1-person-title"><?php _e('search_height', 'betheme') ?>:</span> <span class="pr1-person-info"><?php echo $person[0]->height; ?></span>
            </li>
            <li>
              <span class="pr1-person-title"><?php _e('search_weight', 'betheme') ?>:</span> <span class="pr1-person-info"><?php echo $person[0]->weight; ?></span>
            </li>
            <li>
              <span class="pr1-person-title"><?php _e('search_eye_color', 'betheme') ?>:</span> <span class="pr1-person-info"><?php echo $customHelper->eyeColorMap($person[0]->eye_color); ?></span>
            </li>
            <li>
              <span class="pr1-person-title"><?php _e('search_hair_color', 'betheme') ?>:</span> <span class="pr1-person-info"><?php echo $customHelper->hairColorMap($person[0]->hair_color); ?></span>
            </li>
            <li>
              <span class="pr1-person-title"><?php _e('person_profession', 'betheme') ?>:</span> <span class="pr1-person-info"><?php echo $person[0]->profession; ?></span>
            </li>
            <li>
              <span class="pr1-person-title"><?php _e('person_smoking', 'betheme') ?>:</span> <span class="pr1-person-info"><?php echo $person[0]->smoking; ?></span>
            </li>
            <li>
              <span class="pr1-person-title"><?php _e('person_languages', 'betheme') ?>:</span> <span class="pr1-person-info"><?php echo $person[0]->languages; ?></span>
            </li>
            <li>
              <span class="pr1-person-title"><?php _e('person_family_status', 'betheme') ?>:</span> <span class="pr1-person-info"><?php echo $person[0]->family_status; ?></span>
            </li>
            <li>
              <span class="pr1-person-title"><?php _e('person_kids', 'betheme') ?>:</span> <span class="pr1-person-info"><?php echo $person[0]->kids; ?></span>
            </li>
          </ul>
        </div>
      </section>
      <section class="pr1-lvl2-wrap pr1-wrap">
        <p>
          <span><?php _e('person_about_myself', 'betheme') ?>:</span> <span class="pr1-person-info"><?php echo $person[0]->about; ?></span>
        </p>
          <?php if ($person[0]->wishes_to_man != "") { ?>
            <p>
              <span><?php _e('person_about_target', 'betheme') ?>:</span> <span class="pr1-person-info"><?php echo $person[0]->wishes_to_man; ?></span>
            </p>
          <?php } ?>
      </section>
      <section class="pr1-gallery pr1-wrap">
          <?php $images = explode(",", $person[0]->path_to_images);
          foreach ($images as $img) {
              ?>
            <a href="<?php echo $customHelper->convertImgPath($img); ?>" data-lightbox="roadtrip"><img src="<?php echo $customHelper->convertImgPath($img); ?>" alt=""></a>
          <?php } ?>
      </section>
        <?php if (strpos($person[0]->video_link, 'no_video') === false): ?>
          <section class="pr1-video pr1-wrap">
            <video src="<?php echo $customHelper->convertImgPath($person[0]->video_link); ?>" controls></video>
          </section>
        <?php endif; ?>
    </div>
  </div>


<?php get_footer();
