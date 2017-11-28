<?php include("components/header.php"); ?>
    <div class="container">
        <div class="top-bar">
            <?php
            if (isset($_GET['id'])) {
                    require_once "libs/chapter.php";
                    $chapter = new Chapter($dbh);
                    $chapter = $chapter->fetchChapterById($_GET['id']);
                    $chapter_name = $chapter->name;
                    $chapter_id = $chapter->id;
                    $subject_id = $chapter->subject_id;
            }?>
            <h1 class="title"><?=isset($chapter_name) ? $chapter_name : 'Academia'?> | Articles </h1>
            <span>
                <span><?php echo $_SESSION['user']; ?></span>
                <span class="box"><img src="assets/prof.jpg" alt="" srcset=""></span>
            </span>
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
                            <div class="displaycard">
                                <a href="article.php?id=<?=$article->id?>">
                                    <div class="card-image">
                                        <img src="assets/chapter.jpg" alt="Orange" />
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3><?=$article->name?></h3>
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
                <a href="#"onclick="addArticle()" class="btn">Add Article</a>
            </div>
            <div class="buttons">
                <a href="#"  onclick="loadQuestions(<?=$id?>)" class="btn">Questions</a>
            </div>
            <div class="top-sidebar">
                <div class="title">Topics </div>
                <a href="" onclick="addTopic(<?=isset($subject_id) ? $subject_id : ''?>,<?=isset($chapter_id) ? $chapter_id : ''?>)" class="btn">Add </a>
            </div>
            <div class="topics">
                <ul class="topic_list">
                <?php
                    require_once "libs/topic.php";
                    $topics = new Topic($dbh);
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $topics = $topics->fetchTopicByChapter($id);
                        if (isset($topics) && sizeof($topics) > 0){
                            foreach ($topics as $topic) { ?>
                             <li><a href="#" onclick="loadArticles(<?=$topic->id?>)"> <?=$topic->name?></a></li>

                        <?php }
                        }
                    }
                ?>
                </ul>
            </div>
        </div>
    </div>
<?php include("components/footer.php");?>