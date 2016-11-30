<?php
		function get_db(){
		$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8mb4','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
		}

		function get_post($id){
			$sql = "select * from posts where id = ${id}";
			$stmt=get_db()->query($sql);
			foreach($stmt as $row){
				$post = $row;
			}
			return $post;
		}

		function get_blogname(){
			return "ねっこっ";
		}

		function get_title($title) {
			return get_blogname() . '-' . $title;
		}

		function get_posts_by_category($cat) {
			$sql = "select * from posts where category = '${cat}' and status = 'published' order by created_at";
			return do_query($sql);
		}

		function get_posts_by_search($q){
			$sql = "select * from posts where title like '%${q}%' or content like '%${q}%' and status = 'published' order by created_at desc";
			return do_query($sql);
		}

		function get_posts_by_status($st){
			$sql = "select * from posts where status = 'draft' order by created_at desc";
			return do_query($sql);
		}

		function get_posts(){
			$sql="select * from posts where status = 'published' order by created_at desc";
			return do_query($sql);
		}

		function get_posts_months(){
			$sql = "select count(*) as count, date_format(created_at, '%Y') as year, date_format(created_at, '%m') as month from posts group by date_format(created_at, '%Y'), date_format(created_at, '%m') order by year, month";
			return do_query($sql);
		}
		function get_categories(){
			$category_sql = "select category, count(*) as count from posts group by category";
			return do_query($category_sql);
		}

		function get_posts_by_month($year, $month) {
			$sql = "select * from posts where created_at like '${year}-${month}%' ";
			return do_query($sql);
		}

		function is_year(){
		return isset($_GET['y']);
	  }

	  function is_category(){
	  	return isset($_GET['cat']);
	  }

	  function is_search(){
	  	return isset($_Get['q']);
	  }

	  function is_draft(){
	  	return isset($_GET['st']);
	  }

	  function is_archive_by_month(){
	  	return isset($_GET['y']) and isset($_GET['m']);
	  }

		function do_query($sql){
			$stmt = get_db()->query($sql);
			$result = [];
			foreach($stmt as $row){
				$result[] = $row;
			}
			return $result;
		}

		function get_profile(){
			$select_sql = "select * from profiles limit 1";
			$profile = get_db()->query($select_sql)->fetch();
			return $profile;
		}

		//view utilities
		function link_tag($url, $label){
			$tag = "<a href='${url}'>$label</a>";
			echo $tag;
		}

		function to_english_month($mon){
			$months = ['01'=> 'Jan', '02'=>'Feb', '03'=>'Mar', '04'=>'Apl', '05'=>'May', '06'=>'Jun', '07'=>'Jul', '08'=>'Aug', '09'=>'Sep', '10'=>'Oct', '11' => 'Nov', '12'=>'Dec',];
			return $months[$mon];
		}

		function breadcrumbs($pages, $delimiter){
			//$pages = [['url'=>'index.php', 'label'=>'HOME', []];
			if (empty($delimiter)){//デリミターを入れる動作。区切り文字。変数作って。デリミター定義。
				$delimiter=">";
			}
			$tag= "<ul class='breadcrumbs'>"; //パンくず全体を入れとく入れ物。クラスを呼び出す。HTMLの様子をタグという変数にする。
			foreach($pages as $index=>$page) { //渡された関数のpagesからとってきて、foreach文で一個一個処理をしていってる。indexは一周目はゼロ。
				$url = $page['url'];//配列の値を変数に入れてる。index.php
				$label = $page['label'];//HOME
				$li = "<li>";//最終的にli要素を作りたい。別に変数にする必要はない。
				if ($index +1 == count($pages)){//一番最後の要素はリンクにさせない。$indexがキー変数。つまり、0123と数字がつく。添字が3になったら終了。
					$li = "${li}${label}</li> ";
				}else{
					$li="${li}<a href='${url}'>${label}</a></li><li>${delimiter}</li>";
				}
				$tag = $tag . $li;//ピリオドは連結する。タグにぃすとをたしてる。
			}
			$tag = "${tag}</ul>";
			return $tag;
		}
		//ifで文章取り出す。しかし、カウントは3。3になるまでエルスになる。エルスで、一階目は一個目の配列を取ってくる。二回目で二個目の配列、三回目でイフ分にもどる。

?>
