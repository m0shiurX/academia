<?php
    include("components/header.php");
    if (isset($_POST['name']) && isset($_POST['data'])) {
        $name = $_POST['name'];
        $data = $_POST['data'];
        require_once "libs/article.php";
        $article = new Article($dbh);
        if (!$article->addArticle($name, $data)) {
            echo "Sorry Post Failed !";
        }
        echo "Successfully loaded";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Summernote</title>
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
</head>
<body>
    <div class="msg"></div>
    <form action="" method="post">
        <input id="name" type="text" name="name">
        <div id="summernote"><p>Hello Summernote</p></div>
        <input type="hidden" name="data">
        <input class="submit" type="button" value="Save">
    </form>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
        var markupStr = $('#summernote').summernote('code');
        console.log(markupstr);
    });
  </script>
</body>
</html>