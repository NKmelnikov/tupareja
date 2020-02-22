<?php
require_once '../Service/ClientApplicationHandler.php';

use Service\ClientApplicationHandler;

$ladiesApplicationClient = new ClientApplicationHandler();
$result = $ladiesApplicationClient->mensAction($_POST);
echo print_r(json_encode($result),true);
die();
