<?php include("components/header.php"); ?>
    <div class="container">
        <div class="top-bar">
            <h1 class="title">Academia | Articles </h1>
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
        <div class="lay"></div>
        <main>
            <div class="objects">
                <?php 
                    require_once "libs/article.php";
                    $articles = new Article($dbh);
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        // Article details to be loaded
                        $article = $articles->fetchArticleByID($id);
                        if (isset($article) && sizeof($article) > 0){?>
                            <div class="postcard">
                                    <div class="card-image">
                                        <img src="assets/orange.jpg" alt="Orange" />
                                        <div onclick="add2Note(<?=$_SESSION['id']?>,<?=$article->id?>)"" class="plus">+</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3><?=$article->name?></h3>
                                        </div>
                                        <div class="card-excerpt">
                                            <div class="author"> 
                                                <img src="assets/prof.jpg" alt="M" />
                                                 <h4>Md Moshiur Rahman</h4>
                                            </div>
                                            <date> August 1st, 2017 </date>
                                            <p><?=$article->data?></p>
                                        </div>
                                    </div>
                            </div>
                        <?php
                        }
                    }
                ?>
            </div>
        </main>
        <div class="side-bar">
            <div class="buttons">
            <a href="add2notes.php" class="btn">Ask Questions</a>
            <a href="#"  onclick="goBack()" class="btn">Back</a>
            </div>
            <div class="top-sidebar">
                <div class="title">Newsfeed :</div>
            </div>
            <?php include("components/newsfeed.php"); ?>
        </div>
    </div>
<?php include("components/footer.php");?>