<?php
require_once '../Service/LadiesApplicationAdminUpdate.php';
//
//set_include_path(get_include_path().PATH_SEPARATOR.'/wp-content/themes/betheme/_Custom/');
//spl_autoload_extensions('.php, .inc');
//spl_autoload_register();

use Service\LadiesApplicationAdminUpdate;

$ladiesApplicationUpdate = new LadiesApplicationAdminUpdate();
$result = $ladiesApplicationUpdate->ladiesUpdate($_POST);
echo print_r(json_encode($result),true);
die();
