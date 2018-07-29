<?php // header.php ?>
<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MyBlog</title>
        <link rel="stylesheet" href="myblog.css">
    </head>
    <body>
        <div id="wrap">
            <header>
                <h1><a href="manageBlog.php">MyBlog</a></h1>
                <div class="newBlog"><a href="inputBlog.php">[ NEW ]</a></div>
                <div class="notice">
                    <?php if (!empty($_GET['msg'])) echo $_GET['msg']; ?>
                </div>
                <div id="findBtn" onclick="findSwitch()">
                    <img src="img/find.png" alt="検索">
                </div>
                <?php require_once 'findBlog.php'; ?>
            </header>
            <!-- <div class="notice clearfix">
                 <div class="message">
                 <?php // if (!empty($_GET['msg'])) echo $_GET['msg']; ?>
                 </div>
                 </div> -->
            <article>
