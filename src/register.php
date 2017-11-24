<?php

	require_once 'components/headx.php';
	if (isset($_SESSION['user']) ){
        $commons->redirectTo(SITE_PATH.'dashboard.php');
    }
    require_once "libs/account.php";
    $accounts = new Account($dbh);

    if (isset($_POST['username']) && isset($_POST['password'])){
        $user_name = htmlspecialchars( $_POST['username'], ENT_QUOTES, 'UTF-8' );
	    $user_pwd = htmlspecialchars( $_POST['password'], ENT_QUOTES, 'UTF-8' );
        if (!$accounts->loginAdmin($user_name, $user_pwd)){
            session::set('error', 'Cannot connect you. Check your credentials.');
            $commons->redirectTo(SITE_PATH.'login.php');
        }
        session::set('user', $user_name);
        $commons->redirectTo(SITE_PATH.'dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Login | Academia</title>
</head>

<body>
    <div class="login-container">
        <div class="logo">
            <img src="assets/logo.png" alt="CSE">
        </div>

        <form action="login.php" method="POST">
            <div class="form-group">
                <!-- <?php  if ( isset($_SESSION['error']) ): ?>
                    <div class="warning">
                        
                        <?= $_SESSION['error'] ?>
                    </div>
                <?php session::destroy('error'); endif ?> -->
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="text" name="name" placeholder="Name" required>
                <select>
                        <option value="volvo">Teacher</option>
                        <option value="saab">Student</option>
                </select>


                <button class="btn" type="submit">Sign Up</button>
            </div>
        </form>

    </div>
    <script src="js/main.js"></script>
</body>
</html>