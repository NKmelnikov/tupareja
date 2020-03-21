<?php
require_once '../Service/ContactFormHandler.php';

use Service\ContactFormHandler;

$cfh = new ContactFormHandler();
$result = $cfh->sendFormAction($_POST);
echo print_r(json_encode($result), true);
die();
