<?php
    if($_SESSION['role'] == 'student'){ ?>
        <ul class="f-menu">
        <?php 
            require_once "libs/subject.php";
            $subject = new Subject($dbh);
            $subjects = $subject->fetchSubjectsBySemister($_SESSION['semister_id']);
            if (isset($subjects) && sizeof($subjects) > 0){
                foreach ($subjects as $subject) { ?>
                <li><a href="subject.php?id=<?=$subject->id?>"><?=$subject->name?></a></li>
        <?php }} ?>
        </ul>
        
    <?php
    }else {?>
        <ul class="f-menu">
        <?php 
            require_once "libs/semister.php";
            $semister = new Semister($dbh);
            $semisters = $semister->fetchSemisters();
            if (isset($semisters) && sizeof($semisters) > 0){ 
                foreach ($semisters as $semister) { ?>
                <li><a href="semister.php?id=<?=$semister->id?>"><?=$semister->name?></a></li>
        <?php }} ?>
        </ul>
<?php }