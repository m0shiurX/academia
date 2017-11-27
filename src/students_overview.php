<?php include("components/header.php"); ?>
<?php
    if (isset($_POST['semister']) && isset($_POST['current_semister'])) {
        require_once "libs/account.php";        
        $semisterUpdate = new Account($dbh);
        $currentSemister = $_POST['current_semister'];
        if ($semisterUpdate->updateStudentSemister($_POST['semister'], $currentSemister)) {
            return true;
        }else{
            return false;
        }
    }

?>
    <div class="container">
        <div class="top-bar">
            <h1 class="title">Academia | Students</h1>
            <span>
                <span><?php echo $_SESSION['user']; ?></span>
                <span class="box"><img src="assets/prof.jpg" alt="" srcset=""></span>
            </span>
        </div>
        <div class="floating-menu">
            <div class="logo">
                <div class="box">
                    <img src="assets/logo.png" alt="CSE">
                </div>
            </div>
            <?php include("components/f-menu.php"); ?>
        </div>
        <main>
            <div class="actionbar">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    require_once "libs/semister.php";
                    $semister = new Semister($dbh);
                    $details = $semister->fetchSemisterByID($id);?>
                <div class="informations">
                    <ul>
                        <li><h2><?=$details->name?></h2></li>
                        <!-- <li>34 Students</li>
                        <li>15 Male</li>
                        <li>19 Female</li> -->
                    </ul>
                </div>
                <div class="actions">
                    <form id="insert_form" action="update.php" method="POST">
                        <input type="hidden" name="current_semister" value="<?=$details->name?>">
                        <select name="semister" id="semister">
                            <option value="2">2nd Semister</option>
                            <option value="3">3rd Semister</option>
                            <option value="4">4th Semister</option>
                        </select>
                        <button class="btn" type="submit" id="promotion">Promote All</button>
                    </form>
                    <!-- <button class="btn">Individually</button> -->
                </div>
                <?php
                }?>
            </div>
            <div class="flextable">
                <div class="trow thead">
                    <div class="tcolumn">Roll No</div>
                    <div class="tcolumn">Name</div>
                    <div class="tcolumn">Gender</div>
                    <div class="tcolumn">Contact</div>
                    <!-- <div class="tcolumn">Stat</div> -->
                </div>
                <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        require_once "libs/account.php";
                        $students = new Account($dbh);
                        $informations = $students->fetcStudentsInfobySemister($id); 
                        if (isset($informations) && sizeof($informations) > 0){ 
                            foreach ($informations as $info) { ?>
                            <div class="trow">
                                <div class="tcolumn" data-header="semister"><?=$info->id?></div>
                                <div class="tcolumn" data-header="semister"><?=$info->fullname?></div>
                                <div class="tcolumn" data-header="semister"><?=$info->gender?></div>
                                <div class="tcolumn" data-header="semister"><?=$info->contact?></div>
                                <!-- <div class="tcolumn button" data-header=""><a href="student_stat.php?id=<?=$semister->id?>" class="btn">STAT</a></div> -->
                            </div>

                        <?php }
                        }
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