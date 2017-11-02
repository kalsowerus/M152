<?php
$target_file = "uploads/" . pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME) . ".mp4";
$source_file = $_FILES["file"]["tmp_name"];

echo "<pre>" . shell_exec("C:\\Users\\geroy\\Downloads\\ffmpeg-3.4-win64-static\\ffmpeg-3.4-win64-static\\bin\\ffmpeg.exe -i $source_file -vcodec h264 -acodec aac $target_file 2>&1") . "</pre>";
//echo move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

echo "<br>";
echo $_FILES["file"]["error"];
echo "<br>";
echo pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
echo "<br>";
echo $_FILES["file"]["tmp_name"];

echo "<br>";
echo "<a href=\"/poc/$target_file\">Video</a>";

//shell_exec("C:\Users\geroy\Downloads\ffmpeg-3.4-win64-static\ffmpeg-3.4-win64-static\bin\ffmpeg.exe ");
?>
