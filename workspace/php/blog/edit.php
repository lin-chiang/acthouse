<?php include 'header.php'; ?>
<?php require 'utils.php' ?>
<?php
	if (!isset($_GET['id'])){
		$error= "idが指定されてません";
	} else {
		$id = $_GET['id'];
		$post=get_post($id);
	}
?>
<?php if (isset($error)) : ?>
	<?php echo $error; ?>
<?php else : ?>
	<div id="container">
		<ul class="breadcrumbs">
			<li><a href="index.php">HOME</a></li>
			<li> > </li>
			<li><a href="show.php?id=<?php echo $id; ?>"><?php echo $post['title']; ?></a></li>
			<li> > </li>
			<li>記事編集</li>
		</ul>
		<?php $pages =
		[
			['url'=> 'index.php', 'label' => 'HOME'],
			['url'=>"show.php?id=${id}", 'label'=>$post['title']],
			['url'=>'', 'label'=>'記事編集']
		];
			echo breadcrumbs($pages, "-----");
		?>


		<form action="post.php" name="form" method="post" enctype="multipart/form-data">
			<div>
				<label for="title">タイトル
					<input type="text" name="title" value="<?php echo $post['title']; ?>">
				</label>
			</div>
			<div>
				<label for="content">内容<textarea name="content" id="" cols="70" rows="10"><?php echo $post['content']; ?></textarea>
				</label>
			</div>
			<div>
				<label for="category">
					<input type="text" name="category" value="<?php echo $post['category']; ?>">
				</label>
			</div>
			<div>
				<label for="image">
					<input type="file" name="image">
				</label>
			</div>
			<div>
					<label for="draft">
						<?php
							$draft = $post['status']=='draft';
						?>
						下書き
							<input type="checkbox" name="draft" value="true" <?php if ($draft) echo 'checked'; ?>>
					</label>

				</div>
				<div>
					<button>送信</button>
					<input type="hidden" name="mode" value="edit">
					<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
				</div>
			<?php endif; ?>

						</form>

	</div>

<?php include 'footer.php'; ?>