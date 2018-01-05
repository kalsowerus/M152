<?php
	$id = $_POST['id'];
	$likes = 0;
	
	$connection = new mysqli("localhost", "root", "", "m152");
    if($connection->connect_error) {
        die("DB Connection failed: $connection->connect_error");
    }
	
	$getLikeCount = $connection->prepare("SELECT likes FROM Video WHERE id=?");
	$getLikeCount->bind_param("s", $id);
	
	$setLikeCount = $connection->prepare("UPDATE Video SET likes=? WHERE id=?");
	$setLikeCount->bind_param("is", $likes, $id);
	
	if($getLikeCount->execute()) {
		$likes = $getLikeCount->get_result()->fetch_assoc()['likes'] + 1;
		$setLikeCount->execute();
	}
?>
