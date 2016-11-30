<?php
	require 'utils.php';
	$page_title=get_title("新規記事作成"); ?>
<?php include 'header.php'; ?>
<body>
	<div id="container">
		<div>
			<ul class="breadcrumbs">
				<li><a href="index.php">HOME</a></li>
				<li> > </li>
				<li>新規記事作成</li>
		  </ul>
		</div>
		<div id="new">
			<form action="post.php" name="form" method="post" enctype="multipart/form-data">
				<div>
					<label for="title">タイトル
						<input type="text" name="title">
					</label>
				</div>
				<div>
					<label for="content">内容<textarea name="content" id="" cols="70" rows="10"></textarea>
					</label>
				</div>
				<div>
					<label for="category">カテゴリ<input type="text" name="category">
					</label>
				</div>
			<div>
				<label for="image">
					画像
					<input type="file" name="image">
				</label>
		</div>
		<div>
			<label for="draft">
				下書き
				<input type="checkbox" name="draft" value="true">
			</label>
		</div>
		<div>
			<button>送信</button>
		</div>
				</form>

	</div>
<?php include 'footer.php'; ?>