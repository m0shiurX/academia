<?php include("components/header.php"); ?>
    <div class="container">
        <div class="top-bar">
            <h1 class="title">Academia</h1>
            <span>
                <?php echo $_SESSION['user']; ?>
                <span class="box"><img src="assets/prof.jpg" alt="" srcset=""></span>
            </span>
        </div>
        <div class="floating-menu">
            <div class="logo">
                <div class="box"></div>
            </div>
            <?php include("components/floatingmenu.php"); ?>
        </div>
        <main>
            <div class="objects">
                <p><?php echo $_SESSION['user']; ?></p>
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