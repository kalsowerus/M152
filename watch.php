<?php
	$connection = new mysqli("localhost", "root", "", "m152");
    if($connection->connect_error) {
        die("DB Connection failed: $connection->connect_error");
    }
	
	$id = $_GET['id'];
	
	$findVideo = $connection->prepare("SELECT * FROM Video WHERE id=?");
	$findVideo->bind_param("s", $id);
	
	if($findVideo->execute()) {
		$video = $findVideo->get_result()->fetch_assoc();
	}
?>

<html>
	<?php include "lib\\head.php" ?>
	<body>
		<?php include "lib\\nav.php" ?>
		<div class="container">
			<div class="embed-responsive embed-responsive-16by9 thumbnail">
				<video src="/m152/uploads/<?php echo $video['id'] ?>/video.mp4" controls />
			</div>
			<button class="btn btn-default" id="likeButton">Like</button>
			<button class="btn btn-default" id="dislikeButton">Dislike</button>
			<span class="glyphicon glyphicon-thumbs-up"></span>
			<span id="likes"><?php echo $video['likes'] ?></span>
			<h2><?php echo $video['title'] ?></h2>
			<p><?php echo $video['description'] ?></p>
		</div>
		
		<script>
			$('#likeButton').click(function() {
				$.post('/m152/like.php', {
					id: <?php echo $video['id'] ?>
				}, function() {
					$('#likes').text(parseInt($('#likes').text()) + 1);
				});
			});
			$('#dislikeButton').click(function() {
				$.post('/m152/dislike.php', {
					id: <?php echo $video['id'] ?>
				}, function() {
					$('#likes').text(parseInt($('#likes').text()) - 1);
				});
			});
		</script>
	</body>
</html>
