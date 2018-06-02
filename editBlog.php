<?php // editBlog.php
require_once 'mylib.php';

if (!empty($_POST['id'])) {
	$id = (int)$_POST['id'];
	$db = new PDO($dbname);
	$query = "select * from $tablename where id = :id";
	$stmt = $db->prepare($query);
	$stmt->bindValue(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$id = $row['id'];
		$title = $row['title'];
		$body = $row['body'];
		$date = $row['date'];
		$category = $row['category'];
		$tag = $row['tag'];
	}
	$db = null;
}


require_once 'header.php';
?>

<h1 class="inputBlog-h1">編集34</h1>
<form action="updateBlog.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <label for="form-title">タイトル:</label><br>
    <input type="text" name="title" id="form-title" required
    value="<?php echo $title; ?>"><br>

    <label for="form-body">内容:</label><br>
    <textarea name="body" id="form-body" required><?php echo $body; ?></textarea><br>

    <label for="form-category">カテゴリ:</label><br>
    <input type="text" name="category" id="form-category" required
    value="<?php echo $category; ?>"><br>

    <label for="form-tag">タグ:</label><br>
    <input type="text" name="tag" id="form-tag" required
    value="<?php echo $tag; ?>"><br>

    作成:<input type="text" name="date" id="form-date"
                value="<?php echo date("Y-m-d H:i"); ?>"><br>

    <input type="submit" value="更新" id="form-submit">
    <a href="manageBlog.php" id="form-cancel">
        <button type="button">取消</button></a>
</form>

<?php require_once 'footer.php'; ?>
