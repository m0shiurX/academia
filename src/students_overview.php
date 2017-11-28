<?php include("components/header.php"); ?>
<?php
    if (isset($_POST['current_semister'])) {
        require_once "libs/account.php";        
        $semisterUpdate = new Account($dbh);
        $currentSemister = $_POST['current_semister'];
        $nextSemister = $_POST['semister'];
        if ($semisterUpdate->updateStudentSemister($nextSemister, $currentSemister)) {
            return true;
        }else{
            return false;
        }
    }
    if (isset($_POST['semister_id'])) {
        require_once "libs/account.php";        
        $semisterUpdate = new Account($dbh);
        $semister = $_POST['semister_id']+1;
        $account = $_POST['account_id'];
        if ($semisterUpdate->updateIndividualStudentSemister($account, $semister)) {
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
                    $details = $semister->fetchSemisterByID($id);
                    $current = $details->id;
                    ?>
                <div class="informations">
                    <ul>
                        <li><h2><?=$details->name?></h2></li>
                    </ul>
                </div>
                <div class="actions">
                    <form id="insert_form" action="update.php" method="POST">
                        <input type="hidden" name="current_semister" value="<?=$details->name?>">
                        <input type="hidden" name="next_semister" value="<?=$details->id+1?>">
                        <select type="hidden" name="semister" id="semister">
                                <?php 
                                        $semisters = $semister->fetchSemisters();
                                        if (isset($semisters) && sizeof($semisters) > 0){
                                            foreach ($semisters as $semister) {
                                                $new = $semister->id;
                                                //if ($current >= $new || $current+1 < $new){
                                                if ($current >= $new){ ?>
                                                    <option value="" disabled><?=$semister->name?></option>
                                            <?php }else{?>
                                                    <option value="<?=$new?>"><?=$semister->name?></option>
                                            <?php }
                                         ?> 
                                    <?php }
                                        }
                                ?>
                        </select>
                        <button class="btn" type="submit" id="promotion">Promote ALL</button>
                    </form>
                    <!-- <button class="btn">Individually</button> -->
                </div>
                <?php
                }?>
            </div>
            <div class="flextable">
                <div class="trow thead">
                    <div style="flex-grow:.3" class="tcolumn">Roll</div>
                    <div class="tcolumn">Name</div>
                    <div style="flex-grow:0.5"  class="tcolumn">Gender</div>
                    <div class="tcolumn">Address</div>
                    <div class="tcolumn">Contact</div>
                    <div class="tcolumn">Action</div>
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
                                <div style="flex-grow:0.3" class="tcolumn" data-header="semister"><?=$info->id?></div>
                                <div class="tcolumn" data-header="semister"><?=$info->fullname?></div>
                                <div style="flex-grow:0.4" class="tcolumn" data-header="semister"><?=$info->gender?></div>
                                <div class="tcolumn" data-header="semister"><?=$info->address?></div>
                                <div class="tcolumn" data-header="semister"><?=$info->contact?></div>
                                <div class="tcolumn button" data-header=""><a href="#" onclick="promoteOne(<?=$info->semister_id?>,<?=$info->id?>)" class="btn">Promote</a></div>
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