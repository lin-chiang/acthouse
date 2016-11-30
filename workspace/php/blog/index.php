<?php require 'utils.php'; ?>
<?php $page_title=get_title('HOME'); ?>
<?php include 'header.php'; ?>


	<div id="container">
		<div>
		 	<a href="index.php">HOME</a>
		</div>
		<div>
					<form action="index.php">
						<input type="text" name="q">
						<button>検索</button>
					</form>
		</div>
		<div onclick="obj=document.getElementById('index').style; obj.display=(obj.display=='none')?'block':'none';">
			<a style="cursor:pointer;">▼カテゴリ一覧</a>
		</div>
		<div id="index" style="display:none;clear:both;">
		 	<ul>
		 		<?php foreach(get_categories() as $row) : ?>
		 			<li class="cate">
		 				<?php $category = $row['category'];  
		 				 link_tag("index.php?cat=${category}", $category);
		 				 echo $row['count']; ?>
		 			</li>
		 		<?php endforeach; ?>
		 	</ul>
		</div>

		<div onclick="obj=document.getElementById('edit').style; obj.display=(obj.display=='none')?'block':'none';">
			<a style="cursor:pointer;">▼記事作成</a>
		</div>
		<div id="edit" style="display:none;clear:both;">
			<a href="new.php">新規作成</a>
			<a href="index.php?st=draft">下書き一覧</a>
		</div>

		<div onclick="obj=document.getElementById('date').style; obj.display=(obj.display=='none')?'block':'none';">
			<a style="cursor:pointer;">▼ 月別記事</a>
		</div>
		<div id="date" style="display:none;clear:both;">
			<?php
				//月別アーカイブ一覧
				foreach(get_posts_months() as $row) :
					$year = $row['year'];
					$month = $row['month'];
					$show_month = to_english_month($month);
					$qs = "y=${year}&m=${month}";
					link_tag("index.php?${qs}", "${year}/${show_month}");
			?>
				<?php endforeach; ?>
		</div>
		<div>
			<?php

			if (is_category()) {
				$result = get_posts_by_category($cat);
			} else if (is_search()){
				$result = get_posts_by_search($q);
			} else if(is_draft()){
				$result = get_posts_by_status();
			} else if(is_archive_by_month()){
				$result = get_posts_by_month($year, $month);
			} else {
				$result = get_posts();
			}
			//	$stmt= get_db()->query($sql);
			//	$count_sql = str_replace('*', 'count(*)', $sql);
			//	$count_stmt = get_db()->query($count_sql);
			//	$count = $count_stmt->fetch();
			if (is_category()) : ?>
				<p>カテゴリ<?php echo $_GET['cat']; ?>の投稿一覧</p>
			<?php endif;
			if (is_year()) : ?>
				<p><?php echo $year; ?>年<?php echo $month; ?>月の投稿一覧</p>
			<?php endif;
				if (count($result) == 0){ ?>
					<p>検索結果がありませんでした</p>
		<?php	} else {
			// 記事表示開始
			 	foreach($result as $row) {
			?>
					<a href="show.php?id=<?php echo $row['id']; ?>">
					<article>
						<h2><?php echo $row['title']; ?></h2>
						<span>カテゴリ: <?php echo $row['category']; ?></span>
						<span><p><?php echo $row['created_at']; ?></p></span>
						<span><p><?php echo $row['updated_at']; ?></p></span>
						<p><?php echo $row['content']; ?></p>
						<?php if (empty($row['image_path'])) : ?>
							<img src="noimage.png" alt="">
						<?php else : ?>
							<img src="image.php?id=<?php echo $row['id']; ?>" alt="<?php echo $row['title']; ?>">
						<?php endif; ?>
					</article><hr style="border-top: 6px double #ff9d9d;width: 100%;height:3;">
			<?php }} ?>

		</div>
		<div id="profile">
		<aside>
			<a href="edit_profile.php">
			<h2>プロフィール</h2>
			<?php $profile = get_profile(); ?>
			<img class="prof" src="image.php?p" alt="<?php echo $profile['name']; ?>">
			<h3 class="name"><?php echo $profile['name']; ?></h3>
			<p class="bio"><?php echo $profile['bio']; ?></p>
		</aside>
	</div>
	</div>

<?php include 'footer.php'; ?>