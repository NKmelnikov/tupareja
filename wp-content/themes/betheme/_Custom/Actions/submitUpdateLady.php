<?php
require_once '../Service/LadiesApplicationAdminUpdate.php';

use Service\LadiesApplicationAdminUpdate;

$ladiesApplicationUpdate = new LadiesApplicationAdminUpdate();
$result = $ladiesApplicationUpdate->ladiesUpdate($_POST);
echo print_r(json_encode($result),true);
die();
