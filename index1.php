<?php
$fileName = 'titanic.csv';
$file = fopen($fileName,'titanic.csv');
$fileContent = fread($file, filesize($fileName));
fclose($file);
$search = ' Peter Denis Daly';
$position = strpos($fileContent);
?>
