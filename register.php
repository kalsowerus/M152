<html>
	<?php include "lib\\head.php" ?>
	<body>
		<?php include "lib\\nav.php" ?>
		<div class="container">
			<h2>Register</h2>
			<form action="/m152/register.php" method="POST">
				<div class="form-group">
					<label for="username">Username</label>
					<input name="username" id="username" class="form-control" />
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" />
				</div>
				<div class="form-group">
					<label for="password_repeat">Repeat Password</label>
					<input type="password" name="password_repeat" id="password_repeat" class="form-control" />
				</div>
				<input type="submit" class="btn btn-default" value="Register" />
			</form>
		</div>
	</body>
</html>
