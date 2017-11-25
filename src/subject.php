<?php include("components/header.php"); ?>
    <div class="container">
        <div class="top-bar">
            <h1 class="title">Academia | Chapters </h1>
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
                    require_once "libs/chapter.php";
                    $chapters = new Chapter($dbh);
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $chapters = $chapters->fetchChapterBySubject($id);
                        if (isset($chapters) && sizeof($chapters) > 0){
                            foreach ($chapters as $chapter) { ?>
                            <div class="card">
                                <a href="chapter.php?id=<?=$chapter->id?>">
                                    <div class="card-image">
                                        <img src="assets/orange.jpg" alt="Orange" />
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3><?=$chapter->name?></h3>
                                        </div>
                                        <div class="card-excerpt">
                                            <p><?=$chapter->description?></p>
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
            <div class="top-sidebar">
                <div class="title">Subjects and Contents :</div>
            </div>
            <?php include("components/ranking.php"); ?>
        </div>
    </div>
<?php include("components/footer.php");?>
