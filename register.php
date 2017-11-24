<?php
if($_SERVER['REQUEST_METHOD'] === 'GET') {
?>
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
<?php
} else if($_SERVER['REQUEST_METHOD'] === 'POST') {
	if($_POST['password'] !== $_POST['password_repeat']) {
		die("Passwords don't match");
	}
	
	$connection = new mysqli("localhost", "root", "", "m152");
	if($connection->connect_error) {
		die("DB Connection failed: $connection->connect_error");
	}
	
	$findUser = $connection->prepare("SELECT id FROM User WHERE name = ?");
	$findUser->bind_param("s", $_POST['username']);
	
	$findUser->execute();
	$result = $findUser->get_result();
	if($result->num_rows > 0) {
		$connection->close();
		die("User exists");
	} else {
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$createUser = $connection->prepare("INSERT INTO User (name, password) VALUES (?, ?)");
		$createUser->bind_param("ss", $_POST['username'], $password);
		if($createUser->execute()) {
			$connection->close();
			header("Location: /m152/login.php");
			die();
		} else {
			$connection->close();
			die("Error creating user: $createUser->error");
		}
	}
	
	$connection->close();
}
?>
