<?php include 'header.php'; ?>
<?php require 'utils.php' ?>
	<?php

		$title = $_POST['title'];
		$content = $_POST['content'];
		$category = $_POST['category'];
		if (empty($category)){
			$category = '未分類';
		}
		$image = $_FILES['image'];
		$is_edit = isset($_POST['mode']) and $_POST['mode']=="edit";

		if ($is_edit){
			$id = $_POST['id'];
		}

		if (empty($title) or empty($content)){
			$error = "タイトルと内容を入力してください。";
		} else {
			if (isset($_POST['draft'])){
					$status="draft";
				} else{
					$status = "published";
				}
			if ($is_edit){
				$sql = "update posts set title = ?, content = ?, category = ?, status = ?, updated_at = current_timestamp where id = ?";
				$id=$_POST['id'];
				$params=array($title, $content, $category, $status, $id);
			} else {

				$sql = "insert into posts (title, content, category, status, created_at, updated_at)
				values (?, ?, ?, ?, current_timestamp, current_timestamp)";
				$params = array($title, $content, $category, $status);

			}
			$st = get_db()->prepare($sql);
			$success = $st->execute($params);

			if (!$is_edit) {
			$id = get_db()->query("select id from posts order by id desc limit 1")->fetch()['id'];
		  }
			$path = "uploads/${id}";
			@mkdir($path, 0777, true);
			$image_name = $image['name'];
			$image_path = "${path}/${image_name}";
			$image_type = $image['type'];
			move_uploaded_file($image['tmp_name'], $image_path);

			$sql = "update posts set image_path = ?, image_type = ? where id = ?";
			$params = array($image_path, $image_type, $id);
			$st = get_db()->prepare($sql);
			$success = $st->execute($params);

			if (!$success){
				$error = "データの更新に失敗しました";
			}
		}
	?>
	<?php if(isset($error)): ?>
		<?php echo $error; ?>
		<?php if ($is_edit): ?>
			<a href="edit.php?id=<?php echo $id; ?>">
			記事編集画面に戻る</a>
		<?php else : ?>
			<a href="new.php">記事作成画面に戻る</a>
		<?php endif; ?>
	<?php else : ?>
		<p>投稿されました</p>
	<?php endif; ?>
	<a href="index.php">TOPへ戻る</a>
<?php include 'footer.php'; ?>