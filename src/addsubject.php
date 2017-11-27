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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">.
    <link rel="stylesheet" href="../node_modules/trumbowyg/dist/ui/trumbowyg.min.css">
    <title>Document</title>
</head>
<body>
    <form action="addsubject.php" method="post">
        <input type="text" name="name">
        <textarea name="data" id="trumbowyg-demo" autofocus></textarea>
        <input type="submit" value="Save">
    </form>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="../node_modules/trumbowyg/dist/trumbowyg.min.js"></script>
<script>
    $('#trumbowyg-demo').trumbowyg();
</script>
</body>
</html>