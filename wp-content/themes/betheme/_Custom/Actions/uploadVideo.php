<?php
require_once( explode( "wp-content" , __FILE__ )[0] . "wp-load.php" );
const UPLOAD_DIR =ABSPATH. 'wp-content/uploads';

if(isset($_FILES)) {
	$targetPath = UPLOAD_DIR.DIRECTORY_SEPARATOR.date("Y").DIRECTORY_SEPARATOR.date("d.m");
	if (!file_exists($targetPath)){
		mkdir(dirname($targetPath), 0777, true);
	}
	$uploadFile = $targetPath.DIRECTORY_SEPARATOR.basename($_FILES['file']['name']);
	if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
	echo $uploadFile;
	} else {
	echo "Ошибка ".$_FILES['file']['error']."<br>";
	}
	} else {
	echo "Вы не прислали файл!";
}
