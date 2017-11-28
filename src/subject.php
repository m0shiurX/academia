<?php include("components/header.php"); ?>
    <div class="container">
        <div class="top-bar">
            <?php
            if (isset($_GET['id'])) {
                    require_once "libs/subject.php";
                    $subject = new Subject($dbh);

                    $subject = $subject->fetchSubjectById($_GET['id']);
                    $subject_name = $subject->name;
            }?>
            <h1 class="title"><?=isset($subject_name) ? $subject_name : 'Academia'?> | Chapters </h1>
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
                                        <img src="assets/chapter.jpg" alt="<?=$chapter->name?>" />
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3><?=$chapter->name?></h3>
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
                <a href="#" onclick="addChapter(<?=isset($id) ? $id : 0?>)" class="btn">Add Chapter</a>
            </div>
            <div class="top-sidebar">
                <div class="title">Newsfeed:</div>
            </div>
            <?php include("components/newsfeed.php"); ?>
        </div>
    </div>
<?php include("components/footer.php");?>
