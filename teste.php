<?php

$file_url = $_GET['teste2.php'];
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"Declaração.pdf" . basename($file_url) . "\""); 
readfile($file_url);

?>