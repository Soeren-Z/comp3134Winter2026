<?php
$content = file_get_contents("storedxss.txt");

echo $content;
?>