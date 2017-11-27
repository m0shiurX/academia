<?php include("components/header.php"); ?>
    <div class="container">
        <div class="top-bar">
            <h1 class="title">Academia | Topics </h1>
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
                    require_once "libs/topic.php";
                    $topics = new Topic($dbh);
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $topics = $topics->fetchTopicByChapter($id);
                        if (isset($topics) && sizeof($topics) > 0){
                            foreach ($topics as $topic) { ?>
                            <div class="card">
                                <a href="topic.php?id=<?=$topic->id?>">
                                    <div class="card-image">
                                        <img src="assets/orange.jpg" alt="Orange" />
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3><?=$topic->name?></h3>
                                        </div>
                                        <div class="card-excerpt">
                                            <p><?=$topic->description?></p>
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
                <a href="addtopic.php" class="btn">Add Topics</a>
            </div>
            <div class="top-sidebar">
                <div class="title">Subjects and Contents :</div>
            </div>
            <?php include("components/ranking.php"); ?>
        </div>
    </div>
<?php include("components/footer.php");?>