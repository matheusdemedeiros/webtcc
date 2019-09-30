<?php

$file_url = $_GET['declaracao.php?id=29'];
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"Declaração.pdf" . basename($file_url) . "\""); 
readfile($file_url);

?>