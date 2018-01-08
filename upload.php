<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection = new mysqli("localhost", "root", "", "m152");
    if($connection->connect_error) {
        die("DB Connection failed: $connection->connect_error");
    }

    session_start();

    $createVideo = $connection->prepare("INSERT INTO Video (title, description, likes, uploader) VALUES (?, ?, 0, ?)");
    $createVideo->bind_param("ssi", $_POST['title'], $_POST['description'], $_SESSION['user']);

    if($createVideo->execute()) {
        $id = $connection->insert_id;

        $videoSource = $_FILES['video']['tmp_name'];
        $thumbnailSource = $_FILES['thumbnail']['tmp_name'];

        mkdir("uploads/$id");
        $videoTarget = "uploads/$id/video.mp4";
        $thumbnailTarget360 = "uploads/$id/360.png";
        $thumbnailTarget720 = "uploads/$id/720.png";

        shell_exec("lib\\ffmpeg.exe -i \"$videoSource\" -vcodec h264 -acodec aac \"$videoTarget\"");
        shell_exec("lib\\ffmpeg.exe -i \"$thumbnailSource\" -vf scale=360:-1 \"$thumbnailTarget360\"");
        shell_exec("lib\\ffmpeg.exe -i \"$thumbnailSource\" -vf scale=720:-1 \"$thumbnailTarget720\"");
    }
}
?>
<!DOCTYPE html>
<html>
	<?php include "lib\\head.php" ?>
	<body>
		<?php include "lib\\nav.php" ?>
		<div class="container">
			<h2>Upload Video</h2>
			<form action="/m152/upload.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="title">Title</label>
					<input name="title" id="title" class="form-control" />
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" id="description" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="thumbnail">Thumbnail</label>
					<input type="file" name="thumbnail" id="thumbnail" />
				</div>
				<div class="form-group">
					<label for="video">Video</label>
					<input type="file" name="video" id="video" />
				</div>
				<input type="submit" class="btn btn-default" value="Upload" />
			</form>
		</div>
	</body>
</html>
