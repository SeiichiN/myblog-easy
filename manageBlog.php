<?php  // manageBlog.php

require_once 'mylib.php';

$db = new PDO($dbname);
$query = "select * from $tablename";
$stmt = $db->query($query);
?>
<?php require_once 'header.php'; ?>
<?php
// $stmtを実行して、1レコードずつ連想配列に読み込む
while ($blog = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $blog['id'];
?>
    <section class="clearfix manageBlog">
        <div class="id">id:<?php echo $id; ?></div>
        <h1 class="title">
            <a href="showBlog.php?id=<?php echo $id; ?>">
                <?php echo $blog['title']; ?></a></h1>
        <div class="body"><?php echo $blog['body']; ?></div>
        <div class="date">作成:<time><?php echo substr($blog['date'], 0, 10); ?></time></div>
        <div class="category">カテゴリ: <?php echo $blog['category']; ?></div>
        <div class="tag">タグ: <?php echo $blog['tag']; ?></div>
    </section>
<?php } ?>
<?php require_once 'footer.php'; ?>
<?php
$db = null;
?>
