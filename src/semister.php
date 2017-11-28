<?php include("components/header.php"); ?>
    <div class="container">
        <div class="top-bar">
            <h1 class="title">Academia | Subjects </h1>
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
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $subjects = $subject->fetchSubjectsBySemister($id);
                        if (isset($subjects) && sizeof($subjects) > 0){
                            foreach ($subjects as $subject) { ?>
                            <div class="card">
                                <a href="subject.php?id=<?=$subject->id?>">
                                    <div class="card-image">
                                        <img src="assets/books.jpg" alt="Orange" />
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3><?=$subject->name?></h3>
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
                <a onclick="addSubject()" href="#" class="btn">Add Subject</a>
            </div>
            <div class="top-sidebar">
                <div class="title">Newsfeed :</div>
            </div>
            <?php include("components/newsfeed.php"); ?>
        </div>
    </div>
<?php include("components/footer.php");?>
