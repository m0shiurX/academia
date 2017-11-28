<?php include("components/header.php"); ?>
<?php
    if (isset($_POST['id'])) {
        require_once "libs/account.php";        
        $activation = new Account($dbh);
        $id = $_POST['id'];
        if ($activation->activateTeacher($id)) {
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
                <div class="informations">
                    <ul>
                        <li><h2>Activation Panel</h2></li>
                    </ul>
                </div>
                <div class="actions">
                    <button class="btn" onclick="goBack()" type="button" >BACK</button>
                </div>
            </div>
            <div class="flextable">
                <div class="trow thead">
                    <div class="tcolumn">Name</div>
                    <div class="tcolumn">Gender</div>
                    <div class="tcolumn">Address</div>
                    <div class="tcolumn">Contact</div>
                    <div class="tcolumn">Action</div>
                </div>
                <?php
                        require_once "libs/account.php";
                        $accounts = new Account($dbh);
                        $deactivateTeachers = $accounts->fetcDeactivatedTeachers(); 
                        if (isset($deactivateTeachers) && sizeof($deactivateTeachers) > 0){ 
                            foreach ($deactivateTeachers as $deTeacher) { ?>
                            <div class="trow">
                                <div class="tcolumn" data-header="semister"><?=$deTeacher->fullname?></div>
                                <div class="tcolumn" data-header="semister"><?=$deTeacher->gender?></div>
                                <div class="tcolumn" data-header="semister"><?=$deTeacher->address?></div>
                                <div class="tcolumn" data-header="semister"><?=$deTeacher->contact?></div>
                                <div class="tcolumn button msg">
                                    <a  class="btn tactivator" data-id="<?=$deTeacher->id?>" href="#">ACTIVATE</a>
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