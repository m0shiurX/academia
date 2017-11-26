<?php include("components/header.php"); ?>
    <div class="container">
        <div class="top-bar">
            <h1 class="title">Academia | Classroom </h1>
        </div>
        <div class="minimal-menu">
            <div class="logo">
                <div class="box">
                    <img src="assets/logo.png" alt="CSE">
                </div>
            </div>
            <?php include("components/f-menu.php"); ?>
        </div>
        <div class="menu-bar">
            <?php include("components/menu.php"); ?>        
        </div>
        <main>
            <div class="objects">
                <div class='widget'>
                    <header>
                        <h3>Students Engagement</h3>
                    </header>
                    <div class='chart'>
                        <div class='controls'>
                        <nav>
                            <a href='javascript:void(0);'>This week<span class='fa fa-angle-down fa-lg'></span></a>
                        </nav>
                        <div>
                            <span class='fa fa-caret-up fa-lg'>&nbsp;&nbsp;</span>
                            <span>57%</span>
                        </div>
                        </div>
                        <div class='canvas-container'>
                        <canvas id='c1'></canvas>
                        </div>
                    </div>
                    <div class='info'>
                        <h4>Student info:</h4>
                        <div class='info-module'>
                        <div class='heading'>
                            <span>Completed</span>
                            <span>25%</span>
                        </div>
                        <div class='progress undergraduate'></div>
                        </div>
                        <div class='info-module'>
                        <div class='heading'>
                            <span>Seen</span>
                            <span>80%</span>
                        </div>
                        <div class='progress graduate'></div>
                        </div>
                        <div class='info-module'>
                        <div class='heading'>
                            <span>Questioned</span>
                            <span>15%</span>
                        </div>
                        <div class='progress transfer'></div>
                        </div>
                        <div class='info-module'>
                        <div class='heading'>
                            <span>Answered</span>
                            <span>5%</span>
                        </div>
                        <div class='progress questioned'></div>
                        </div>
                        <nav>
                        <a href='javascript:void(0);'><span> stats</span><span class='fa fa-refresh fa-lg'></span></a>
                        </nav>
                    </div>
                </div>
            </div>
        </main>
        <div class="side-bar">
            <div class="buttons">
                <a href="login.php" class="btn">Add Subjects</a>
            </div>
            <div class="top-sidebar">
                <div class="title">News Feed :</div>
            </div>
            <?php include("components/newsfeed.php"); ?>
        </div>
    </div>
<?php include("components/footer.php"); ?>
