<?php
	$connection = new mysqli("localhost", "root", "", "m152");
    if($connection->connect_error) {
        die("DB Connection failed: $connection->connect_error");
    }

	$sort = isset($_GET['sort'])? $_GET['sort'] : 'name_asc';

	switch($sort) {
		case 'name_desc':
			$sortString = 'title DESC';
			break;
		case 'likes_asc':
			$sortString = 'likes ASC';
			break;
		case 'likes_desc':
			$sortString = 'likes DESC';
			break;
		case 'name_asc':
			$sortString = 'title ASC';
			break;
	}
	
	$listVideos = $connection->prepare("SELECT * FROM Video ORDER BY $sortString");
?>
<html>
	<?php include "lib\\head.php" ?>
	<body>
		<?php include "lib\\nav.php" ?>
		<div class="container">
			<h2>Browse</h2>
			<form class="form-inline">
				<label for="sort">Sort by</label>
				<select id="sort" class="form-control">
					<option value="name_asc">Name ascending</option>
					<option value="name_desc">Name descending</option>
					<option value="likes_asc">Likes ascending</option>
					<option value="likes_desc">Likes descending</option>
				</select>
			</form>
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
		
		<script>
			<?php
				echo "$('#sort').val('$sort');";
			?>
		
			$('#sort').change(function() {
				window.location = '/m152/browse.php?sort=' + $(this).val();
			});
		</script>
	</body>
</html>
