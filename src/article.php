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
                        $articles = $articles->fetchArticleByTopic($id);
                        if (isset($articles) && sizeof($articles) > 0){
                            foreach ($articles as $article) { ?>
                            <div class="postcard">
                                    <div class="card-image">
                                        <img src="assets/orange.jpg" alt="Orange" />
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3><?=$article->name?></h3>
                                        </div>
                                        <div class="card-excerpt">
                                            <p><?=$article->data?></p>
                                        </div>
                                    </div>
                            </div>
                        <?php }
                        }
                    }
                ?>
            </div>
        </main>
        <div class="side-bar">
            <div class="buttons">
                <a href="login.php" class="btn">Add Article</a>
            </div>
            <div class="top-sidebar">
                <div class="title">Subjects and Contents :</div>
            </div>
            <?php include("components/ranking.php"); ?>
        </div>
    </div>
<?php include("components/footer.php");?>