<?php
// manageBlog.php

require 'mylib.php';

$db = new PDO($dbname);
$query = "select * from $tablename";
$stmt = $db->query($query);

?>
<?php require_once 'header.php'; ?>

<?php
// $stmtを実行して1レコードずつ連想配列に読み込む
while ($blog = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $blog['id'];
?>
    <section class="manageBlog clearfix">
        <div class="id">id:<?php echo $id; ?></div>
        <h1 class="title">
            <a href="showBlog.php?id=<?php echo $id; ?>">
                <?php echo $blog['title']; ?></a></h1>
        <div class="body"><?php echo $blog['body']; ?></div>
        <div class="date">作成: <time><?php echo $blog['date']; ?></time></div>
        <div class="category">カテゴリ: <?php echo $blog['category']; ?></div>
        <div class="tag">タグ: <?php echo $blog['tag']; ?></div>
    </section>
<?php } ?>

<?php require_once 'footer.php'; ?>                
<?php
$db = null;
?>
