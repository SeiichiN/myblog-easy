<?php // insertBlog.php

require_once 'mylib.php';

$okcount = 0;
if (!empty($_POST['title']))    { $title    = $_POST['title'];    $okcount++; }
if (!empty($_POST['body']))     { $body     = $_POST['body'];     $okcount++; }
if (!empty($_POST['date']))     { $date     = $_POST['date'];     $okcount++; }
if (!empty($_POST['category'])) { $category = $_POST['category']; $okcount++; }
if (!empty($_POST['tag']))      { $tag      = $_POST['tag'];      $okcount++; }

if ($okcount === 5) {
	$db = new PDO($dbname);
	$query = "insert into $tablename (title, body, date, category, tag) values (?, ?, ?, ?, ?)";
	$stmt = $db->prepare($query);
	$stmt->bindValue(1, $title, PDO::PARAM_STR);
	$stmt->bindValue(2, $body, PDO::PARAM_STR);
	$stmt->bindValue(3, $date, PDO::PARAM_STR);
	$stmt->bindValue(4, $category, PDO::PARAM_STR);
	$stmt->bindValue(5, $tag, PDO::PARAM_STR);
	$stmt->execute();
	$msg = "登録しました。";

    $query = "select id from $tablename where rowid = last_insert_rowid()";
    $stmt = $db->query($query);
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];
    }

	$db = null;
    
} else {
	$msg = "未入力の項目があったので、登録しませんでした。";
}
header ("Location: showBlog.php?id={$id}");
// echo $msg;

/* try {
   
   処理
   
   } catch (PDOException $e) {
   echo "えらー: ", $e->getMessage(), " (File: ", $e->getFile(), ") (Line: ", $e->getLine(), ")";
   } finally {
   $db = null;
   } */
