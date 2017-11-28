<?php
    include("components/headx.php");
    if (isset($_POST['name']) && $_POST['subject_id']!=="" && isset($_POST['chapter_id'])) {

        $name = $_POST['name'];
        $subject_id = $_POST['subject_id'];
        $chapter_id = $_POST['chapter_id'];
        $description = $_POST['description'];

        require_once "libs/topic.php";
        $topic = new Topic($dbh);
        if ($topic->exists($name)) {
            $msg = "Topic Already Available !";
        }elseif (!$topic->addTopic($subject_id, $chapter_id, $name, $description)) {
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
        <form action="addtopic.php" method="post">
            <input type="hidden" name="subject_id" value="<?=isset($_GET['subject']) ? $_GET['subject'] : ''?>" required>
            <input type="hidden" name="chapter_id" value="<?=isset($_GET['chapter']) ? $_GET['chapter'] : ''?>" required>
            <input type="text" name="name" placeholder="Topic Name" required>
            <input type="text" name="description" placeholder="Topic Description">
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