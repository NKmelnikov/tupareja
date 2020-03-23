<?php
/*
Template Name: forPerson
*/

require_once 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php';
use Repository\ClientRepository;
use Helper\CustomHelper;

get_header( 'person' );
$clientRepository = new ClientRepository();

function convertImgPath($src){
	preg_match_all('`(\/wp-content.*)`im', $src, $new_src, PREG_SET_ORDER);
	if (!empty($new_src)) {
		return $new_src[0][0];
	}
	return '';
}

function getCurrentAge($timestamp)
{
	$age = date('Y') - date('Y', $timestamp);
	if (date('n') < date('n', $timestamp)) {
		$age--;
	}
	if ((date('n') == date('n', $timestamp)) && (date('j') < date('j', $timestamp))) {
		$age--;
	}
	return $age;
}

$person = $clientRepository->getById(TABLE_LADIES,$_GET['id']);
$pathToCustom = '/wp-content/themes/betheme/_Custom/';

CustomHelper::build();
$config = CustomHelper::instance();
$v = $config->version();
?>
  <link rel="stylesheet" href="<?= $pathToCustom .'_static/scss/person/person.css?v='.$v ?>">

  <div id="Content" class="container">
    <div class="content_wrapper clearfix ">

      <section class="pr1-lvl1-wrap pr1-wrap">
	      <div class="left"><img width="300" src="<?php echo convertImgPath($person[0]->main_image_path);?>" alt="<?php echo $person[0]->name; ?>"></div>
	      <div class="right">
		      <ul>
			      <li><span>Имя:</span> <?php echo $person[0]->name;?></li>
			      <li><span>ID:</span> <?php echo $person[0]->id;?></li>
			      <li><span>Возраст:</span> <?php echo getCurrentAge($person[0]->date_of_birth )?></li>
			      <li><span>Страна:</span> <?php echo $person[0]->country;?></li>
			      <li><span>Город:</span> <?php echo $person[0]->town;?></li>
			      <li><span>Рост:</span> <?php echo $person[0]->height;?></li>
			      <li><span>Вес:</span> <?php echo $person[0]->weight;?></li>
			      <li><span>Цвет глаз:</span> <?php echo $person[0]->eye_color;?></li>
			      <li><span>Профессия:</span> <?php echo $person[0]->profession;?></li>
			      <li><span>Курение:</span> <?php echo $person[0]->smoking;?></li>
			      <li><span>Знание языков:</span> <?php echo $person[0]->languages;?></li>
			      <li><span>Семейное положение:</span> <?php echo $person[0]->family_status;?></li>
			      <li><span>Дети:</span> <?php echo $person[0]->kids;?></li>
		      </ul>
	      </div>
      </section>
	    <section class="pr1-lvl2-wrap pr1-wrap">
		    <p><span>О себе:</span> <?php echo $person[0]->about;?></p>
		    <?php if ($person[0]->wishes_to_man!=""){?>
		    <p><span>О партнере:</span> <?php echo $person[0]->wishes_to_man;?></p>
			<?php }?>
	    </section>
	    <section class="pr1-gallery pr1-wrap">
		    <?php $images=explode(",",$person[0]->path_to_images);
		    foreach ($images as $img)
		    {?>
		    <a href="<?php echo convertImgPath($img);?>" data-lightbox="roadtrip"><img src="<?php echo convertImgPath($img);?>" alt=""></a>
		    <?php }?>
	    </section>
      <?php if($person[0]->video_link !== 'http://no_video'): ?>
	    <section class="pr1-video pr1-wrap">
		    <video src="<?php echo convertImgPath($person[0]->video_link);?>" controls></video>
	    </section>
      <?php endif;?>
    </div>
  </div>


<?php get_footer();
