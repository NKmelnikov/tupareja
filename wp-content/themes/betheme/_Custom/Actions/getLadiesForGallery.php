<?php
require_once '../Service/MainGalleryHandler.php';

use Service\MainGalleryHandler;

$mgh = new MainGalleryHandler();
$result = $mgh->getLadies();
echo print_r(json_encode($result),true);
die();
