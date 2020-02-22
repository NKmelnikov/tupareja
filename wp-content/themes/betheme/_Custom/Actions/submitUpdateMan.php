<?php
require_once '../Service/MenApplicationAdminUpdate.php';

use Service\MenApplicationAdminUpdate;

$MenApplicationUpdate = new MenApplicationAdminUpdate();
$result = $MenApplicationUpdate->MenUpdate($_POST);
echo print_r(json_encode($result),true);
die();
