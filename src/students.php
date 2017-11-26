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
            <div class="objects">

                <?php 
                        // require_once "libs/account.php";
                        // $accounts = new Account($dbh);
                        // $accounts = $accounts->fetchAllStudents();
                        // if (isset($accounts) && sizeof($accounts) > 0){ 
                        //     foreach ($accounts as $account) { ?>
                         <?php //}
                        // }
                ?>
            </div>
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
                <div class="trow">
                    <div class="tcolumn" data-header="semister">
                            1st Semister
                    </div>
                    <div class="tcolumn" data-header="students">
                            38 Students
                    </div>
                    <div class="tcolumn button" data-header="">
                            <a href="#" class="btn">VIEW</a>
                    </div>
                </div>
                <div class="trow">
                    <div class="tcolumn" data-header="semister">
                            1st Semister
                    </div>
                    <div class="tcolumn" data-header="students">
                            38 Students
                    </div>
                    <div class="tcolumn button">
                            <a href="#" class="btn">VIEW</a>
                    </div>
                </div>
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