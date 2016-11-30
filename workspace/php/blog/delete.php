<?php include 'header.php' ; ?>
<?php require 'utils.php' ; ?>
<?php
	if (!isset($_GET['id'])){
		$error="idを指定してください";
	} else{
		$id=$_GET['id'];
		$sql = "delete from posts where id = ?";
		$success = get_db()->prepare($sql)->execute(array($id));
		if (!success){
			$error="データの削除に失敗しました";
		}
	}
?>
<?php if (isset($error)) : ?>
	<p><?php echo $error; ?></p>
<?php else : ?>
	<p>記事が削除されました</p>
<?php endif; ?>
<a href="index.php">TOPへ戻る</a>

<?php include 'footer.php' ; ?>