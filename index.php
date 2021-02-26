<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "Post.php";
require "PostLoader.php";

session_start();


if(isset($_POST['content'])){
    $newContent = new Post($_POST['title'], $_POST['content'], $_POST['author_name']);

    $myPostLoader = new PostLoader();
    $myPostLoader->addPost($newContent);
    $myPostLoader->readPosts();


    if(isset($myPostLoader)){
        foreach($myPostLoader->getUserPosts() as $i => $post){
            //var_dump($post);
            echo $post->getTitle() . "<br>";
        }
}

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="main.css" type="text/css"
          rel="stylesheet"/>
    <title>Welcome to my Guestbook</title>
</head>
<body>
<div class="grid-container">
    <div class="grid-item">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <label>Title: <input type="text" name="title"/></label>
            <label>Author: <input type="text" name="author_name"/></label>
            <label>Please fill in some nonsense: <textarea name="content"></textarea></label>
            <button type="submit" name="content" value="Sent it!">Add to the Guestbook</button>
        </form>

    </div>
</div>
</body>