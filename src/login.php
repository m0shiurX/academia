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
        if (!$accounts->login($user_name, $user_pwd)){
            session::set('error', 'Cannot connect you. Check your credentials.');
            $commons->redirectTo(SITE_PATH.'login.php');
        }elseif(!$ac_details=$accounts->fetchAccountDetails($user_name)) {
            session::set('error', 'Your account is not yet active or disabled.');
            $commons->redirectTo(SITE_PATH.'login.php');
        }else{

            $fullname = $ac_details->fullname;
            $gender = $ac_details->gender;
            $address = $ac_details->address;
            $contact = $ac_details->conatct;
            $username = $ac_details->username;
            $role = $ac_details->role;
            $semister_id = $ac_details->semister_id;
            $session_id = $ac_details->session_id;

            session::set('user', $username);
            session::set('fullname', $fullname);
            session::set('address', $address);
            session::set('contact', $contact);
            session::set('role', $role);
            session::set('session_id', $session_id);
            session::set('semister_id', $semister_id);
            $commons->redirectTo(SITE_PATH.'dashboard.php');
        }
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
                <div class="warning">
                    <?php  if ( isset($_SESSION['error']) ): ?>
                       <span><?= $_SESSION['error'] ?></span> 
                    <?php session::destroy('error'); endif ?>
                </div>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button class="btn" type="submit">Log In</button>
            </div>
        </form>

    </div>
    <script src="js/main.js"></script>

</body>
</html>