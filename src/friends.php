<?php include("components/header.php"); ?>
    <div class="container">
        <div class="top-bar">
            <h1 class="title">Academia | Friends</h1>
            <span>
                <span><?php echo $_SESSION['user']; ?></span>
                <span class="box"><img src="assets/prof.jpg" alt="" srcset=""></span>
            </span>
        </div>
        <div class="floating-menu">
            <div class="logo">
                <div class="box"></div>
            </div>
            <?php include("components/f-menu.php"); ?>
        </div>
        <main>
                <p><?php //echo $_SESSION['user']; ?></p>
                <p><?php //echo $_SESSION['role']; ?></p>
                <p><?php //echo $_SESSION['fullname']; ?></p>
                <p><?php //echo $_SESSION['address']; ?></p>
                <p><?php //echo $_SESSION['contact']; ?></p>
                <p><?php //echo $_SESSION['session_id']; ?></p>
                <p><?php //echo $_SESSION['semister_id']; ?></p>
            <div class="objects">
                <?php 
                        require_once "libs/account.php";
                        $accounts = new Account($dbh);
                        $accounts = $accounts->fetchAllAccounts();
                        if (isset($accounts) && sizeof($accounts) > 0){ 
                            foreach ($accounts as $account) { ?>
                            <div class="card">
                                <a href="profile.php?id=<?=$account->fullname?>">
                                    <div class="card-image">
                                        <img src="assets/orange.jpg" alt="Orange" />
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3><?=$account->fullname?></h3>
                                        </div>
                                        <div class="card-excerpt">
                                            <p><?=$account->fullname?></p>
                                        </div>
                                    </div>
                                </a>
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