<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php
	$arr=array('apple','banana','orange');
	print_r($arr);
	echo($arr[1]);

	echo("<br>");
	$arr2=array('red'=>'apple', 'yellow'=>'banana', 'orange'=>'orange');
	print_r($arr2);

	$arr3=
		array(
			'red'=>array('apple','cherry'),
			'yellow'=>array('banana', 'mango'),
			'orange' 
			);
	print_r($arr3);

	$arr4=['red'=>['apple', 'cherry']];
	print_r($arr4);
?>
<br>
<?php
	$message = <<<EOT
	President Duterte might hold two to four bilateral meetings on the sidelines of the Asia-Pacific Economic Cooperation (APEC) summit in Peru this week, a Department of Foreign Affairs (DFA) official disclosed yesterday. But with which countries
EOT;
	echo $message;
?>
<hr>
<pre>
<?php
	print_r($_SERVER);
?>
</pre>
<h2>GET情報</h2>
<?php
	print_r($_GET);
?>
<h2>ホスト情報</h2>
<?php print_r($_POST); ?>
<h2>FILES情報</h2>	
<?php print_r($_FILES); ?>
<h2>REQUEST情報</h2>
<?php print_r($_REQUEST); ?>

<form method="post" enctype="multipart/form-data">
	<input type="text" name="shopname" value="アヤラセンター">
	<input type="file" name="sample">
	<button>送信</button>
</form>


</body>
</html>