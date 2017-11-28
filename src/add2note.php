<?php
    include("components/headx.php");
    require_once "libs/notebook.php";
    $notebook = new Notebook($dbh);
    if (isset($_POST['article_id']) && isset($_POST['account_id'])) {
        $article_id = $_POST['article_id'];
        $account_id = $_POST['account_id'];
        if ($notebook->exists($article_id, $account_id)) {
            echo "x";
        }elseif (!$notebook->add2Notebook($article_id, $account_id)) {
            echo "sorry";
        }else{
            echo "Done";
        }
    }else{
        echo ":O";
    }
?>