<?php // updateBlog.php

require_once 'mylib.php';

$okcount = 0;
if (!empty($_POST['id']))       { $id  = (int)$_POST['id'];       $okcount++; }
if (!empty($_POST['title']))    { $title    = $_POST['title'];    $okcount++; }
if (!empty($_POST['body']))     { $body     = $_POST['body'];     $okcount++; }
if (!empty($_POST['date']))     { $date     = $_POST['date'];     $okcount++; }
if (!empty($_POST['category'])) { $category = $_POST['category']; $okcount++; }
if (!empty($_POST['tag']))      { $tag      = $_POST['tag'];      $okcount++; }

if ($okcount === 6) {
	$db = new PDO($dbname);
	$query = "update $tablename set title = :title, body = :body, "
		   . "date = :date, category = :category, tag = :tag where id = :id";
	$stmt = $db->prepare($query);
	$stmt->bindValue(':title', $title, PDO::PARAM_STR);
	$stmt->bindValue(':body', $body, PDO::PARAM_STR);
	$stmt->bindValue(':date', $date, PDO::PARAM_STR);
	$stmt->bindValue(':category', $category, PDO::PARAM_STR);
	$stmt->bindValue(':tag', $tag, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$msg = "更新しました。";
	$db = null;
} else {
	$msg = "未入力の項目があったので、更新しませんでした。";
}
header ("Location: showBlog.php?id={$id}&msg={$msg}");
// echo $msg;

/* try {
   
   処理
   
   } catch (PDOException $e) {
   echo "えらー: ", $e->getMessage(), " (File: ", $e->getFile(), ") (Line: ", $e->getLine(), ")";
   } finally {
   $db = null;
   } */
