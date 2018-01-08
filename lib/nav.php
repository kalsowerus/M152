<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/m152">
				<span class="glyphicon glyphicon-film"></span>
				Videos
			</a>
		</div>
		
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav">
				<li><a href="/m152/browse.php">Browse</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
<?php
if(session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(!isset($_SESSION['user'])) {
?>
				<li><a href="/m152/login.php">Login</a></li>
				<li><a href="/m152/register.php">Register</a></li>
<?php
} else {
?>
                <li><a href="/m152/upload.php">Upload</a></li>
                <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?php echo $_SESSION['username']; ?>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="/m152/logout.php">Logout</a></li>
					</ul>
				</li>
<?php
}
?>
			</ul>
		</div>
	</div>
</nav>
