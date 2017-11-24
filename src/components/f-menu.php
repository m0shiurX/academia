     <?php
        if($_SESSION['role'] == 0){ ?>
            <ul class="f-menu">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="studyroom.php">Study Room</a></li>
                <li><a href="friends.php">friends</a></li>
                <li><a href="library.php">library</a></li>
                <li><a href="notebook.php">Notebook</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
            <?php
            }else {?>
            <ul class="f-menu">
                <li><a href="tdashboard.php">Dashboard</a></li>
                <li><a href="classroom.php">Class Room</a></li>
                <li><a href="teachers.php">Teacher</a></li>
                <li><a href="library.php">library</a></li>
                <li><a href="notebook.php">Notebook</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        <?php }