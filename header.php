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
                <h1>MyBlog</h1>
                <div class="newBlog"><a href="inputBlog.php">[ NEW ]</a></div>
            </header>
            <div class="notice"><?php if (!empty($_GET['msg'])) echo $_GET['msg']; ?></div>
            <article>
