<?php include("components/header.php"); ?>
    <div class="container">
        <div class="top-bar">
            <h1 class="title">Academia | Library </h1>
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
                    require_once "libs/subject.php";
                    $subject = new Subject($dbh);
                    $subjects = $subject->fetchSubjects();
                    if (isset($subjects) && sizeof($subjects) > 0){
                        foreach ($subjects as $subject) {
                            $semister_id = $subject->semister_id;
                             ?>
                            <div class="card">
                                <a href="subject.php?id=<?=$subject->id?>">
                                    <div class="card-image">
                                        <img src="assets/orange.jpg" alt="Orange" />
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3><?=$subject->name?></h3>
                                        </div>
                                        <div class="card-excerpt">
                                        <?php
                                            require_once "libs/semister.php";
                                            $semister = new Semister($dbh);
                                            $semisters = $semister->fetchSemisterByID($semister_id); ?>
                                                <p><a href="semister.php?id=<?=$semister_id?>"> <?=$semisters->name?> </a></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                        }
                    }
                ?>
            </div>
        </main>
        <div class="side-bar">
            <div class="top-sidebar">
                <div class="title">Newsfeed</div>
            </div>
            <?php include("components/newsfeed.php"); ?>
        </div>
    </div>
<?php include("components/footer.php");?>
