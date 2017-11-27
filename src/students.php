<?php include("components/header.php"); ?>
    <div class="container">
        <div class="top-bar">
            <h1 class="title">Academia | Students</h1>
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
        <main>
            <div class="flextable">
                <div class="trow thead">
                    <div class="tcolumn">
                        Semister Name
                    </div>
                    <div class="tcolumn">
                        Total Students
                    </div>
                    <div class="tcolumn">
                        View Students
                    </div>
                </div>
                <?php            
                        require_once "libs/semister.php";
                        $semister = new Semister($dbh);
                        require_once "libs/account.php";
                        $students = new Account($dbh);
                        $semisters = $semister->fetchSemisters();
                        if (isset($semisters) && sizeof($semisters) > 0){ 
                            foreach ($semisters as $semister) {
                            $quantity = $students->fetcStudentsbySemister($semister->id);?>
                            <div class="trow">
                                <div class="tcolumn" data-header="semister">
                                <?=$semister->name?>
                                </div>
                                <div class="tcolumn" data-header="students">
                                        <?=$quantity->studentsNumber?> Students
                                </div>
                                <div class="tcolumn button" data-header="">
                                        <a href="students_overview.php?id=<?=$semister->id?>" class="btn">VIEW</a>
                                </div>
                            </div>
                       <?php }
                        }
                ?>
            </div>
        </main>
        <div class="side-bar">
            <div class="top-sidebar">
                <div class="title">News Feed :</div>
            </div>
            <?php include("components/newsfeed.php");?>
        </div>
    </div>
<?php include("components/footer.php"); ?>