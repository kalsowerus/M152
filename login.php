<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$connection = new mysqli("localhost", "root", "", "m152");
	if($connection->connect_error) {
		die("DB Connection failed: " . $connection->connect_error);
	}
	
	$findUser = $connection->prepare("SELECT id, password FROM User WHERE name = ?");
	$findUser->bind_param("s", $_POST['username']);
	
	$findUser->execute();
	$result = $findUser->get_result();
	if($result->num_rows === 1) {
		$user = $result->fetch_assoc();
		$password = $user['password'];
		if(password_verify($_POST['password'], $password)) {
			session_start();
			session_regenerate_id();
			$_SESSION['user'] = $user['id'];
			$_SESSION['username'] = $_POST['username'];
			header("Location: /m152");
			$connection->close();
			die();
		}
	}
	
	$connection->close();
}
?>
<html>
	<?php include "lib\\head.php" ?>
	<body>
		<?php include "lib\\nav.php" ?>
		<div class="container">
			<h2>Login</h2>
			<form action="/m152/login.php" method="POST">
				<div class="form-group">
					<label for="username">Username</label>
					<input name="username" id="username" class="form-control" />
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" />
				</div>
				<input type="submit" class="btn btn-default" value="Login" />
			</form>
		</div>
	</body>
</html>
