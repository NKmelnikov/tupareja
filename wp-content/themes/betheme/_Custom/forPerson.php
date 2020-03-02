<?php
/*
Template Name: forPerson
*/

use Repository\ClientRepository;

get_header( 'person' );
$clientRepository = new ClientRepository();

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
//spl_autoload_register(function ($class) {
//    echo 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
//    echo "/wp-content/themes/betheme/_Custom/$class.php";
//
//    require_once "/wp-content/themes/betheme/_Custom/$class.php";
//});
$pathToCustom = '/wp-content/themes/betheme/_Custom/';
?>
  <link rel="stylesheet" href="/wp-content/themes/betheme/_Custom/_static/scss/person/person.css">

  <div id="Content" class="container">
    <div class="content_wrapper clearfix ">

      <section class="pr1-lvl1-wrap pr1-wrap">
	      <div class="left"><img width="300" src="<?php echo $person[0]->main_image_path;?>" alt="<?php echo $person[0]->name; ?>"></div>
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
		    <p><span>О партнере:</span> <?php echo $person[0]->about;?></p>
			<?php }?>
	    </section>
	    <section class="pr1-gallery pr1-wrap">
		    <?php $images=explode(",",$person[0]->path_to_images);
		    foreach ($images as $img)
		    {?>
		    <a href="<?php echo $img;?>" data-lightbox="roadtrip"><img width="150" src="<?php echo $img;?>" alt=""></a>
		    <?php }?>
	    </section>
	    <section class="pr1-video pr1-wrap">
		    <video src="<?php echo $person[0]->video_link;?>" controls></video>
	    </section>
    </div>


  </div>


<?php get_footer();
