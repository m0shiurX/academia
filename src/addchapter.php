<?php
    include("components/headx.php");
    if (isset($_POST['name']) && $_POST['subject_id']!=="" && isset($_POST['description'])) {
        $name = $_POST['name'];
        $subject_id = $_POST['subject_id'];
        $description = $_POST['description'];
        require_once "libs/chapter.php";
        $chapter = new Chapter($dbh);
        if ($chapter->exists($name)) {
            $msg = "Chapter Already Available !";
        }elseif (!$chapter->addChapter($subject_id, $name, $description)) {
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
        <form action="addchapter.php" method="post">
            <input type="hidden" name="subject_id" value="<?=isset($_GET['id']) ? $_GET['id'] : ''?>" required>
            <input type="text" name="name" placeholder="Chapter Name" required>
            <input type="text" name="description" placeholder="Chapter Description">
            <input type="submit" value="ADD">
        </form>
    </div>
<script>
    console.log(id);
    function refreshParent(){
        window.opener.location.reload();
    }
</script>
</body>
</html>