<?php

	require_once 'components/headx.php';
	if (isset($_SESSION['user']) ){
        $commons->redirectTo(SITE_PATH.'dashboard.php');
    }
    require_once "libs/account.php";
    $accounts = new Account($dbh);

    if (isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['password'])){
        $fullname = htmlspecialchars( $_POST['fullname'], ENT_QUOTES, 'UTF-8' );
	    $username = htmlspecialchars( $_POST['username'], ENT_QUOTES, 'UTF-8' );
	    $password = htmlspecialchars( $_POST['password'], ENT_QUOTES, 'UTF-8' );
	    $contact = htmlspecialchars( $_POST['contact'], ENT_QUOTES, 'UTF-8' );
	    $address = htmlspecialchars( $_POST['address'], ENT_QUOTES, 'UTF-8' );
	    $role = htmlspecialchars( $_POST['role'], ENT_QUOTES, 'UTF-8' );
        $gender = htmlspecialchars( $_POST['gender'], ENT_QUOTES, 'UTF-8' );
        echo "$fullname";
        if (!$accounts->addAccount($fullname, $username, $password, $contact, $address, $role, $gender)){
            session::set('error', 'Cannot connect you. Check your credentials.');
            $commons->redirectTo(SITE_PATH.'register.php');
        }
        session::set('error', 'Account created ! Please login now !');        
        $commons->redirectTo(SITE_PATH.'login.php');
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

        <form action="register.php" method="POST">
            <div class="form-group">
                <div class="warning">
                <?php  if ( isset($_SESSION['error']) ): ?>
                        <?= $_SESSION['error'] ?>
                <?php session::destroy('error'); endif ?>
                    </div>
                <input type="text" name="fullname" placeholder="Full Name" required>
                <input type="textarea" name="adress" placeholder="Address" required>
                <input type="text" name="contact" placeholder="Contact" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <div class="radio">
                    <ul>
                        <li>
                            <input type="radio" id="f-option" value="teacher" name="role" required>
                            <label for="f-option">Teacher</label>
                            <div class="check"></div>
                        </li>
                        
                        <li>
                            <input type="radio" id="s-option" value="student" name="role" required>
                            <label for="s-option">Student</label>
                            <div class="check"></div>
                        </li>
                    </ul>
                </div>
                <div class="radio">
                    <ul>
                        <li>
                            <input type="radio" id="m-option" value="male" name="gender" required>
                            <label for="m-option">Male</label>
                            <div class="check"></div>
                        </li>
                        
                        <li>
                            <input type="radio" id="fm-option" value="female" name="gender" required>
                            <label for="fm-option">Female</label>
                            <div class="check"></div>
                        </li>
                    </ul>
                </div>
                <button class="btn" type="submit">Sign Up</button>
                <p>Already have an account ? <a href="login.php">Log in</a></p>
            </div>
        </form>

    </div>
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
</body>
</html>