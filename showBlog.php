<?php // showBlog.php
require_once 'mylib.php';

if (!empty($_GET['id'])) {
    $id = (int)$_GET['id'];
    $db = new PDO($dbname);
    $query = "select * from $tablename where id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];
        $title = $row['title'];
        $body = $row['body'];
        $date = substr($row['date'], 0, 10);
        $category = $row['category'];
        $tag = $row['tag'];
    }
    $db = null;
}

require_once 'header.php';
?>
<div class="single-page clearfix">
    <div class="editThis">
        <form action="editBlog.php" method="post">
            <button type="submit" name="id" value="<?php echo $id; ?>">
                <img src="img/pencil.png" alt="編集">
            </button>
        </form>
    </div>
    <div class="id">id:<?php echo $id; ?></div>
    <h1 class="title"><?php echo $title; ?></h1>
    <div class="body"><?php echo $body; ?></div>
    <div class="date">作成: <time><?php echo $date; ?></time></div>
    <div class="category">カテゴリ: <?php echo $category; ?></div>
    <div class="tag">タグ: <?php echo $tag; ?></div>
</div><!-- .single-page -->

<?php require_once 'footer.php'; ?>
