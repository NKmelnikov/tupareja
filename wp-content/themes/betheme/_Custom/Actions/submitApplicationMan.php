<?php
require_once '../Service/ClientApplicationHandler.php';

use Service\ClientApplicationHandler;

$ladiesApplicationClient = new ClientApplicationHandler();
$result = $ladiesApplicationClient->menAction($_POST);
echo print_r(json_encode($result),true);
die();
