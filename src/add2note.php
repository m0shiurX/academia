<?php
    include("components/headx.php");
    require_once "libs/notebook.php";
    $notebook = new Notebook($dbh);
    if (isset($_POST['article_id']) && isset($_POST['account_id'])) {
        $article_id = $_POST['article_id'];
        $account_id = $_POST['account_id'];
        if ($notebook->exists($article_id, $account_id)) {
            print "x";
        }elseif (!$notebook->add2Notebook($article_id, $account_id)) {
            echo "ok";
        }else{
            echo "3";
        }
    }else{
        echo "<i class='fa fa-times'></i>";
    }
?>