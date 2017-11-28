<?php include("components/header.php"); ?>
    <div class="container">
        <div class="top-bar">
            <h1 class="title">Academia | Notebook </h1>
        </div>
        <div class="floating-menu">
            <div class="logo">
                <div class="box">
                    <img src="assets/logo.png" alt="CSE">
                </div>
            </div>
            <?php include("components/f-menu.php"); ?>
        </div>
        <!-- <div class="menu-bar"> -->
        <?php //include("components/menu.php"); ?>
        <!-- </div> -->
        <main>
            <div class="objects">
                <?php 
                    require_once "libs/notebook.php";
                    $notebook = new Notebook($dbh);
                    if (isset($_SESSION['id'])) {
                        $id = $_SESSION['id'];
                        $notebook = $notebook->fetchNotebookById($id);
                        if (isset($notebook) && sizeof($notebook) > 0){
                            foreach ($notebook as $note) { ?>
                            <div class="card">
                                <a href="article.php?id=<?=$note->id?>">
                                    <div class="card-image">
                                        <img src="assets/orange.jpg" alt="Orange" />
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3><?=$note->notes?></h3>
                                        </div>
<!--                                         <div class="card-excerpt">
                                            <p><?=$note->article_id?></p>
                                        </div> -->
                                    </div>
                                </a>
                            </div>
                        <?php }
                        }
                    }
                ?>
            </div>
        </main>
        <div class="side-bar">
            <div class="top-sidebar">
                <div class="title">Newsfeed:</div>
            </div>
            <?php include("components/newsfeed.php"); ?>
        </div>
    </div>
<?php include("components/footer.php");?>