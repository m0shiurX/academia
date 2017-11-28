<?php
    include("components/headx.php");
    require_once "libs/article.php";
    $article = new Article($dbh);
    if (isset($_POST['topic_id'])) {
        $topic = $_POST['topic_id'];
        $articles = $article->fetchArticleByTopic($topic);
        if (isset($articles) && sizeof($articles) > 0){
            foreach ($articles as $article) { ?>
            <div class="card">
                <a href="article.php?id=<?=$article->id?>">
                    <div class="card-image">
                        <img src="assets/orange.jpg" alt="Orange" />
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <h3><?=$article->name?></h3>
                        </div>
                        <div class="card-excerpt">
                            <p><?=$article->name?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php }
        }
    }else{
        echo "Something went wront";
    }
?>