<?php
$content = '
<h1>Convert</h1>
<form action="/M152/convert.php" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="fileInput">Video</label>
		<input type="file" name="file" id="fileInput" />
	</div>
	<input type="submit" class="btn btn-default" value="Upload" />
</form>';
include("lib\\template.php");
?>
