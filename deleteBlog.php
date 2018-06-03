<?php // deleteBlog.php
require_once 'mylib.php';

if (!empty($_POST['id'])) {
	$id = (int)$_POST['id'];
	$db = new PDO($dbname);
	$query = "delete from $tablename where id = :id";
	$stmt = $db->prepare($query);
	$stmt->bindValue(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$db = null;
	$msg = "削除しました。";
}
else {
	$msg = "削除できませんでした。";
}

header ("Location: manageBlog.php?msg={$msg}");
exit();
