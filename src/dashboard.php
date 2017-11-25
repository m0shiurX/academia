<?php include("components/header.php"); ?>
    <div class="container">
        <div class="top-bar">
            <h1 class="title">Academia</h1>
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
                <p><?php echo $_SESSION['id']; ?></p>
                <p><?php echo $_SESSION['user']; ?></p>
                <p><?php echo $_SESSION['role']; ?></p>
                <p><?php echo $_SESSION['fullname']; ?></p>
                <p><?php echo $_SESSION['address']; ?></p>
                <p><?php echo $_SESSION['contact']; ?></p>
                <p><?php echo $_SESSION['session_id']; ?></p>
                <p><?php echo $_SESSION['semister_id']; ?></p>
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