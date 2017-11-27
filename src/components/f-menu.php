     <?php
        if($_SESSION['role'] == 'student'){ ?>
            <ul class="f-menu">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="studyroom.php">Study Room</a></li>
                <li><a href="friends.php">friends</a></li>
                <li><a href="library.php">library</a></li>
                <li><a href="notebook.php">Notebook</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
            <?php
            }elseif($_SESSION['role'] == 'teacher'){?>
            <ul class="f-menu">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="activationpanel.php">Activation</a></li>
                <li><a href="classroom.php">Class Room</a></li>
                <li><a href="teachers.php">Teacher</a></li>
                <li><a href="students.php">Students</a></li>
                <li><a href="library.php">library</a></li>
                <li><a href="notebook.php">Notebook</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        <?php }else{?>
            <ul class="f-menu">
                <li><a href="logout.php">Sorry !</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>

        <?php }