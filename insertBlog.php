<?php // insertBlog.php
require_once 'mylib.php';

$okcount = 0;
//それぞれPOSTデータが空でなければ、変数にセット。
if (!empty($_POST['title']))    { $title = $_POST['title'];    $okcount++; }
if (!empty($_POST['body']))     { $body  = $_POST['body'];     $okcount++; }
if (!empty($_POST['date']))     { $date  = $_POST['date'];     $okcount++; }
if (!empty($_POST['category'])) { $category = $_POST['category']; $okcount++; }
if (!empty($_POST['tag']))      { $tag = $_POST['tag'];      $okcount++; }

// var_dump($title);
// echo "\n";
// var_dump($body);
// echo "\n";
// var_dump($date);
// echo "\n";
// var_dump($category);
// echo "\n";
// var_dump($tag);
// echo "\n";

// die();

// $okcountが5ということは、すべての変数がセットできたということ
if ($okcount === 5) {
	// データベースに接続
	$db = new PDO($dbname);
	// prepareという方法でデータをセット。セキュリティと正確さのため、推奨。
	$query = "insert into $tablename ( title, body, date, category, tag ) values (?, ?, ?, ?, ?)";
	$stmt = $db->prepare($query);
	// ?の順番にデータをセットできる。
	$stmt->bindValue(1, $title, PDO::PARAM_STR);
	$stmt->bindValue(2, $body, PDO::PARAM_STR);
	$stmt->bindValue(3, $date, PDO::PARAM_STR);
	$stmt->bindValue(4, $category, PDO::PARAM_STR);
	$stmt->bindValue(5, $tag, PDO::PARAM_STR);
	$stmt->execute();
	$msg = "登録しました。";
	$db = null;
} else {
	$msg = "未入力の項目があったので、データベースには登録しませんでした。";
}

echo $msg;