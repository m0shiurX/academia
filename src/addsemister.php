<?php
    if (isset($_POST['name']) && $_POST['name']!=="") {
        include("components/headx.php");
        $name = $_POST['name'];
        require_once "libs/semister.php";
        $semister = new Semister($dbh);
        if ($semister->exists($name)) {
            $msg = "Semister Already Available !";
        }elseif (!$semister->addSemister($name)) {
            $msg = "Sorry Post Failed !";
        }else{
            $msg = "Successfully Added";
        }
    }else{
        $msg = "Fill the field.";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>New Semister</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body onunload="javascript:refreshParent()">
    <div class="float">
        <div class="msg"><?=$msg?></div>
        <form action="addsemister.php" method="post">
            <input type="text" name="name" placeholder="Semister Name" autofocus required>
            <input type="submit" value="ADD">
        </form>
    </div>
<script>
    function refreshParent(){
        window.opener.location.reload();
    }
</script>
</body>
</html>