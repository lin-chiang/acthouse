<?php
	require 'utils.php';
	if (isset($_GET['p'])){
		$profile = get_profile();
		$image_type = "image/jpeg";//jpegに決め打ちする。ただ、ブラウザが頑張ればgifが帰ってくる。
		$image_path = $profile['image_path'];
		$file_size = filesize($image_path);
	}else {
		$id = $_GET['id'];
		$post = get_post($id);

		$image_type = $post['image_type'];
		$image_path = $post['image_path'];
		$file_size = filesize($image_path);
	}
	header("Content-Length: ${file_size}");//容量サイズ
	header("Content-Type: ${image_type}");//コンテントタイプタイプは教えてあげる。拡張子、種類、表示したいファイルの種類によって変える。HTMLのときは意識しなくていいが、画面に見えない情報までくれる。
	echo file_get_contents($image_path);
	// headerは共通なので括弧の外に出した。画像PHP?pになれば、プロフィール画像が表示される。そこから画像を取ってくるGET。image_typeが何なのかを特定の拡張子だけ判別する。
?>