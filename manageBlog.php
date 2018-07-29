<?php  // manageBlog.php

require_once 'mylib.php';

$db = new PDO($dbname);
$query = "select * from $tablename";
$stmt = $db->query($query);

// findBlogから検索ワードを受け取ったら、$stmtを作りなおす
if (!empty($_POST['findOf']) && !empty($_POST['word'])) {
	$stmt = null;
	$findOf = $_POST['findOf'];
	$word = '%' . $_POST['word'] . '%';
	$query = "select * from $tablename where $findOf like :word";
	$stmt = $db->prepare($query);
	$stmt->bindValue(':word', $word, PDO::PARAM_STR);
	$stmt->execute();
}
?>
<?php require_once 'header.php'; ?>
<?php
// $stmtを実行して、1レコードずつ連想配列に読み込む
while ($blog = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $blog['id'];
?>
    <section class="clearfix manageBlog">
        <div class="id">id:<?php echo $id; ?></div>
        <div class="upper clearfix">
            <div class="trash">
                <form action="deleteBlog.php" method="post" onSubmit="return kakunin()">
                    <button type="submit" name="id" value="<?php echo $id; ?>">
                        <img src="img/trash.png" alt="削除">
                    </button>
                </form>
            </div>
            <h1 class="title">
                <a href="showBlog.php?id=<?php echo $id; ?>">
                    <?php echo $blog['title']; ?></a>
            </h1>
        </div><!-- .upper -->
        <div class="under clearfix">
            <div class="date">作成:<time><?php echo substr($blog['date'], 0, 10); ?></time></div>
            <div class="category">カテゴリ: <?php echo $blog['category']; ?></div>
            <div class="tag">タグ: <?php echo $blog['tag']; ?></div>
        </div><!-- .under -->
    </section>
<?php } ?>
<?php require_once 'footer.php'; ?>
<?php
$db = null;
?>
