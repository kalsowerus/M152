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
