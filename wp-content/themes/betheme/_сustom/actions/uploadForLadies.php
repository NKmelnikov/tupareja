<pre>
<?php
require_once '../service/UploadLadies.php';
use Betheme\Service\UploadLadies;

$uploadLadiesService = new UploadLadies();
var_dump($uploadLadiesService);
$result = $uploadLadiesService->ladiesAction($_POST, $_FILES);
die();
?>
</pre>

