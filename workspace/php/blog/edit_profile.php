<?php require 'utils.php';
$page_title = "プロフィール作成";
include 'header.php'; 

	$profile = get_profile();
	if(isset($_POST['name'])){
		if ($profile){
			$id = $profile['id'];
			$sql = "update profiles set name = ?, bio = ? where id = ?}";
			$params = array($_POST['name'], $_POST['bio'], $id);
		} else {
			$sql = "insert into profiles (name, bio) values (?,?)";
			$params = array($_POST['name'], $_POST['bio']);
			$success = get_db()->prepare($sql)->execute($params);
		}
		$profile = get_profile();
		if (isset($_FILES['image'])){
		$path = "uploads/profile";
		@mkdir($path, 0777, true);
		$image = $_FILES['image'];
		$image_name = $image['name'];
		$image_path = "${path}/${image_name}";
		move_uploaded_file($image['tmp_name'], $image_path);

		$sql = "update profiles set image_path = ?, updated_at = current_timestamp where id = ?";
		$params =array($image_path, $profile['id']);
		$success = get_db()->prepare($sql)->execute($params);
		}
	}
?>
<div id="container">
	<form action="" method="post" enctype="multipart/form-data">
		<div>
			<label for="name">名前<br>
				<input type="text" name="name" value="<?php echo $profile['name']; ?>">
			</label>
		</div>
		<div>
			<label for="bio">自己紹介<br>
				<textarea name="bio" id="" cols="30" rows="10"></textarea>
			</label>
		</div>
		<div>
			<img class="prof" src="image.php?p" alt="画像">
			<label for="">
				<input type="file" name="image">
			</label>
		</div>
		<button>作成</button>
	</form>
</div>

<?php include 'footer.php'; ?>