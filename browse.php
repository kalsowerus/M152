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
			<hr />
			<div class="row">
				<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
					<div style="position: relative;">
						<picture>
							<source media="(min-width: 1200px)" srcset="/m152/uploads/placeholder/lg.jpg" />
							<source media="(min-width: 992px)" srcset="/m152/uploads/placeholder/md.jpg" />
							<img src="/m152/uploads/placeholder/sm.jpg" />
						</picture>
						<span style="
								position: absolute;
								bottom: 0;
								left: 0;
								background-color: white;
								padding: 0.3em;
								border-top-right-radius: 0.5em;">
							<span class="glyphicon glyphicon-thumbs-up"></span>
							5
						</span>
					</div>
				</div>
				<div class="col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-2">
					<h3><a href="/m152/watch.php">Video Title</a></h3>
					<p class="hidden-xs hidden-sm">
						Video description
					</p>
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
					<div style="position: relative;">
						<picture>
							<source media="(min-width: 1200px)" srcset="/m152/uploads/placeholder/lg.jpg" />
							<source media="(min-width: 992px)" srcset="/m152/uploads/placeholder/md.jpg" />
							<img src="/m152/uploads/placeholder/sm.jpg" />
						</picture>
						<span style="
								position: absolute;
								bottom: 0;
								left: 0;
								background-color: white;
								padding: 0.3em;
								border-top-right-radius: 0.5em;">
							<span class="glyphicon glyphicon-thumbs-up"></span>
							5
						</span>
					</div>
				</div>
				<div class="col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-2">
					<h3><a href="/m152/watch.php">Video Title</a></h3>
					<p class="hidden-xs hidden-sm">
						Video description
					</p>
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
					<div style="position: relative;">
						<picture>
							<source media="(min-width: 1200px)" srcset="/m152/uploads/placeholder/lg.jpg" />
							<source media="(min-width: 992px)" srcset="/m152/uploads/placeholder/md.jpg" />
							<img src="/m152/uploads/placeholder/sm.jpg" />
						</picture>
						<span style="
								position: absolute;
								bottom: 0;
								left: 0;
								background-color: white;
								padding: 0.3em;
								border-top-right-radius: 0.5em;">
							<span class="glyphicon glyphicon-thumbs-up"></span>
							5
						</span>
					</div>
				</div>
				<div class="col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-2">
					<h3><a href="/m152/watch.php">Video Title</a></h3>
					<p class="hidden-xs hidden-sm">
						Video description
					</p>
				</div>
			</div>
		</div>
	</body>
</html>
