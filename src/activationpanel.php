<?php include("components/header.php"); ?>
<?php
    if (isset($_POST['id'])) {
        require_once "libs/account.php";        
        $activation = new Account($dbh);
        $id = $_POST['id'];
        if ($activation->activateStudent($id)) {
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
                    <button class="btn" type="button" id="promotion">TEACHERS</button>
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
                        $deactivatedStudents = $accounts->fetcDeactivatedStudents(); 
                        if (isset($deactivatedStudents) && sizeof($deactivatedStudents) > 0){ 
                            foreach ($deactivatedStudents as $deStudent) { ?>
                            <div class="trow">
                                <div class="tcolumn" data-header="semister"><?=$deStudent->fullname?></div>
                                <div class="tcolumn" data-header="semister"><?=$deStudent->gender?></div>
                                <div class="tcolumn" data-header="semister"><?=$deStudent->address?></div>
                                <div class="tcolumn" data-header="semister"><?=$deStudent->contact?></div>
                                <div class="tcolumn button msg">
                                    <a  class="btn activator" data-id="<?=$deStudent->id?>" href="#">ACTIVATE</a>
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