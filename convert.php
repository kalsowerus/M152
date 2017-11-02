<?php
$target_file = "uploads/" . pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME) . ".mp4";
$source_file = $_FILES["file"]["tmp_name"];

$content = "<pre>" . shell_exec("lib\\ffmpeg.exe -i $source_file -vcodec h264 -acodec aac $target_file 2>&1") . "</pre>";
//echo move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

$content .= "<br>";
$content .= $_FILES["file"]["error"];
$content .= "<br>";
$content .= pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
$content .= "<br>";
$content .= $_FILES["file"]["tmp_name"];

$content .= "<br>";
$content .= "<a href=\"/M152/$target_file\">Video</a>";

include "lib\\template.php";

//shell_exec("C:\Users\geroy\Downloads\ffmpeg-3.4-win64-static\ffmpeg-3.4-win64-static\bin\ffmpeg.exe ");
?>
