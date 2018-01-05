<?php
	$connection = new mysqli("localhost", "root", "", "m152");
    if($connection->connect_error) {
        die("DB Connection failed: $connection->connect_error");
    }

	$listVideos = $connection->prepare("SELECT * FROM Video ORDER BY id DESC");
?>

<html>
	<?php include "lib\\head.php" ?>
	<body>
		<?php include "lib\\nav.php" ?>
		<div class="container">
			<h2>New Videos</h2>
			<?php
				if($listVideos->execute()) {
					$result = $listVideos->get_result();
					while($video = $result->fetch_assoc()) {
						?>
						
						<hr />
						<div class="row">
							<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
								<div style="position: relative;">
									<picture>
										<source media="(min-width: 992px)" srcset="/m152/uploads/<?php echo $video['id'] ?>/360.png" />
										<img src="/m152/uploads/<?php echo $video['id'] ?>/720.png" style="width: 100%;" />
									</picture>
									<span style="
											position: absolute;
											bottom: 0;
											left: 0;
											background-color: white;
											padding: 0.3em;
											border-top-right-radius: 0.5em;">
										<span class="glyphicon glyphicon-thumbs-up"></span>
										<?php echo $video['likes'] ?>
									</span>
								</div>
							</div>
							<div class="col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-2">
								<h3><a href="/m152/watch.php?id=<?php echo $video['id'] ?>"><?php echo $video['title'] ?></a></h3>
								<p class="hidden-xs hidden-sm">
									<?php echo $video['description'] ?>
								</p>
							</div>
						</div>
						
						<?php
					}
				}
			?>
		</div>
	</body>
</html>
