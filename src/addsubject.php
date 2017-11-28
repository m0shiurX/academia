<?php
    include("components/headx.php");
    if (isset($_POST['name']) && $_POST['name']!=="" && isset($_POST['semister_id'])) {
        $name = $_POST['name'];
        $semister_id = $_POST['semister_id'];
        require_once "libs/subject.php";
        $subject = new Subject($dbh);
        if ($subject->exists($name)) {
            $msg = "Subject Already Available !";
        }elseif (!$subject->addSubject($semister_id, $name)) {
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
    <title>New Subject</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body onunload="javascript:refreshParent()">
    <div class="float">
        <div class="msg"><?=$msg?></div>
        <form action="addsubject.php" method="post">
            <select name="semister_id" id="semister_id" required>
            <?php 
                    require_once "libs/semister.php";
                    $semister = new Semister($dbh);
                    $semisters = $semister->fetchSemisters();
                    if (isset($semisters) && sizeof($semisters) > 0){
                        foreach ($semisters as $semister) {?>
                        <option value="">Select an Option</option>
                        <option value="<?=$semister->id?>"><?=$semister->name?></option>
                <?php }
                    }
            ?>
            </select>
            <input type="text" name="name" placeholder="Subject Name" required>
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