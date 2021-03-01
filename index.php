<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "Post.php";
require "PostLoader.php";

session_start();
$error_message = "";

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['author_name'])) {
    $title = checkInput(($_POST['title']));
    $content = checkInput(($_POST['title']));
    $authorName = checkInput(($_POST['title']));
} else {
    echo $error_message = "This field should be filled in!";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newContent = new Post($_POST['title'], $_POST['content'], $_POST['author_name']);

    $myPostLoader = new PostLoader();
    $myPostLoader->addPost($newContent);
    $myPostLoader->readPosts();
    //var_dump(min(PostLoader::MAX_POSTS, count($myPostLoader->getUserPosts())));
    //[$i = (count($myPostLoader->getUserPosts()) - 20)]


}

/*foreach ($myPostLoader->getUserPosts() as $i => $post) {
    //var_dump($post);
    echo $post->getDatePost() . "<br>";
    echo $post->getTitle() . "<br>";
    echo $post->getContent() . "<br>";
    echo $post->getAuthorName() . "<br>";

}*/


//header("Location: " . $_SERVER['PHP_SELF']);
//exit;


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="main.css" type="text/css" rel="stylesheet"/>
    <title>Welcome to my Guestbook</title>
</head>
<body>
<div class="grid-container">
    <div class="grid-item input_field">
        <h1>The more Nonsense Guestbook</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <!--<label><input type="date" name="datePost" value="<?php echo date('Y-m-d H:i:s'); ?>" /></label>-->
            <label class="title_field">Title: <br><input type="text" name="title"/></label><?php echo $error_message ?>
            <label class="author_field">Author: <br><input type="text"
                                                           name="author_name"/></label><?php echo $error_message ?>
            <label class="content_field">Please fill in some nonsense: <br><textarea class="userText"
                                                                                     name="content"></textarea></label><?php echo $error_message ?>
            <button type="submit" name="sent_button" class="submit_button" value="">Add to the Guestbook</button>

        </form>
    </div>
    <div class="grid-item display">
        <h2>Most recent Posts:</h2>
        <blockquote>
            <?php
            if (isset($myPostLoader)) {
                $newest_posts = array_reverse($myPostLoader->getUserPosts());
                for ($i = 0; $i <= min(PostLoader::MAX_POSTS, count($myPostLoader->getUserPosts())); $i++) {
                   "Title: " . printf($newest_posts[$i]->getTitle()) . "<br>";
                    printf($newest_posts[$i]->getContent()) . "<br>";
                    printf($newest_posts[$i]->getAuthorName()) . "<br>";
                    printf(date('Y-m-d H:i:s'));

                }
            }
            ?>
        </blockquote>

    </div>
</div>
</body>