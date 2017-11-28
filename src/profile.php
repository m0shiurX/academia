<?php include("components/header.php"); ?>
    <div class="container">
        <div class="top-bar">
            <h1 class="title">Academia | Profile</h1>
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
                    $username = $_GET['id'];
                    require_once "libs/account.php";
                    $account = new Account($dbh);
                    $details = $account->fetchAccountDetails($username);
                    $id = $details->id;
                    ?>
                <div class="informations">
                    <ul>
                        <li><h2><?=$details->fullname?></h2></li>
                        <li><h3><?=$details->address?></h3></li>
                        <li><h3><?=$details->contact?></h3></li>
                        <li><h3><?=$details->gender?></h3></li>
                    </ul>
                </div>
                <div class="actions">
                    Articles by <?=$details->username?>:
                </div>
                <?php
                }?>
            </div>
            <div class="flextable">
                <div class="trow thead">
                    <div style="flex-grow:.3" class="tcolumn">ID</div>
                    <div class="tcolumn">Name</div>
                    <div class="tcolumn">Action</div>
                </div>
                <?php
                    if (isset($id)) {
                        require_once "libs/article.php";
                        $article = new Article($dbh);
                        $getArticle = $article->fetchArticleByAccountID($id); 
                        if (isset($getArticle) && sizeof($getArticle) > 0){ 
                            foreach ($getArticle as $get) { ?>
                            <div class="trow">
                                <div style="flex-grow:0.3" class="tcolumn" data-header="ID"><?=$get->id?></div>
                                <div class="tcolumn" data-header="semister" data-header="semister"><?=$get->name?></div>
                                <div style="flex-grow:0.4" class="tcolumn"><a class="btn" href="article.php?id=<?=$get->id?>">View</a></div>
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