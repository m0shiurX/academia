<?php include("components/header.php"); ?>
    <div class="container">
        <div class="top-bar">
            <?php
            if (isset($_GET['id'])) {
                    require_once "libs/chapter.php";
                    $chapter = new Chapter($dbh);
                    $chapter = $chapter->fetchChapterById($_GET['id']);
                    $chapter_name = $chapter->name;
            }?>
            <h1 class="title"><?=isset($chapter_name) ? $chapter_name : 'Academia | Topics'?></h1>
        </div>
        <div class="minimal-menu">
            <div class="logo">
                <div class="box">
                    <img src="assets/logo.png" alt="CSE">
                </div>
            </div>
            <?php include("components/f-menu.php"); ?>
        </div>
        <div class="menu-bar">
        <?php include("components/menu.php"); ?>
        </div>
        <main>
            <div class="objects">
                <?php 
                    require_once "libs/article.php";
                    $articles = new Article($dbh);
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $articles = $articles->fetchArticleByChapter($id);
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
                    }
                ?>
            </div>
        </main>
        <div class="side-bar">
            <div class="buttons">
                <a href="#"  onclick="goBack()" class="btn">Back</a>
                <a href="addarticle.php" class="btn">Add Article</a>
            </div>
            <div class="top-sidebar">
                <div class="title">Topics: </div>
                <a href="addtopic.php" class="btn">Add New</a>
                <a href="addtopic.php" class="btn">Questions</a>
            </div>
            <div class="newsfeed">
                <ul class="news">
                <?php
                    require_once "libs/topic.php";
                    $topics = new Topic($dbh);
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $topics = $topics->fetchTopicByChapter($id);
                        if (isset($topics) && sizeof($topics) > 0){
                            foreach ($topics as $topic) { ?>
                             <li><?=$topic->name?></li>

                        <?php }
                        }
                    }
                ?>
                </ul>
            </div>
        </div>
    </div>
<?php include("components/footer.php");?>