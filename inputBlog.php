<?php  // inputBlog.php
require_once 'mylib.php';

require_once 'header.php';
?>

<h1 class="inputBlog-h1">新規作成</h1>
<form action="insertBlog.php" method="post">
	<label for="form-title">タイトル:</label><br>
    <input type="text" name="title" id="form-title" required><br>
    
    <label for="form-body">内容:</label><br>
    <textarea name="body" id="form-body" required></textarea><br>
    
    <label for="form-category">カテゴリ:</label><br>
    <input type="text" name="category" id="form-category" required><br>
    
    <label for="form-tag">タグ:</label><br>
    <input type="text" name="tag" id="form-tag" required><br>
    
    作成:<input type="text" name="date" id="form-date"
                value="<?php echo date("Y-m-d H:i"); ?>"><br>
    
    <input type="submit" value="作成" id="form-submit">
    <a href="manageBlog.php" id="form-cancel">
        <button type="button">取消</button></a>
</form>

<?php require_once 'footer.php'; ?>
    
