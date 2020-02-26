alter table wp_ladies modify name tinytext null;

alter table wp_ladies modify date_of_birth tinytext null;

alter table wp_ladies modify email tinytext null;

alter table wp_ladies modify phone tinytext null;

alter table wp_ladies modify family_status tinytext null;

alter table wp_ladies modify kids tinytext null;

alter table wp_ladies modify height tinytext null;

alter table wp_ladies modify weight tinytext null;

alter table wp_ladies modify eye_color tinytext null;

alter table wp_ladies modify languages tinytext null;

alter table wp_ladies modify profession tinytext null;

alter table wp_ladies modify town tinytext null;

alter table wp_ladies modify country tinytext null;

alter table wp_ladies modify about text null;

alter table wp_ladies modify smoking tinytext null;

alter table wp_ladies modify man_wish_age tinytext null;

alter table wp_ladies modify wishes_to_man tinytext null;

alter table wp_ladies modify video_link text null;

alter table wp_ladies modify main_image_path text null;

alter table wp_ladies modify path_to_images text null;

alter table wp_men
	add id int auto_increment primary key first;

create unique index wp_men_id_uindex
	on wp_men (id);

alter table wp_men modify name tinytext null;

alter table wp_men modify date_of_birth int null;

alter table wp_men modify email tinytext null;

alter table wp_men modify phone tinytext null;

alter table wp_men modify country tinytext null;

alter table wp_men modify town tinytext null;

alter table wp_ladies
	add lname tinytext null after name;

alter table wp_ladies
	add fname tinytext null after lname;



