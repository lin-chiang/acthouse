<?php
	require 'utils.php';
	$user_name=$_POST['user_name'];
	$comment = $_POST['comment'];
	$post_id = $_POST['post_id'];

	$sql = "insert into comments (post_id, user_name, comment) values (?, ?, ?)";
	$params = array($post_id, $user_name, $comment);
	$success = get_db()->prepare($sql)->execute($params);
	header("Location: show.php?id=${post_id}");
?>