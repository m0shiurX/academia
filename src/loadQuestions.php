<?php
    include("components/headx.php");
    require_once "libs/question.php";
    $questions = new Question($dbh);
    if (isset($_POST['chapter_id'])) {
        $chapter_id = $_POST['chapter_id'];
        $questoin = $questions->fetchQbychapter($chapter_id);
        if (isset($questoin) && sizeof($questoin) > 0){ ?>
            <div class="questions">
                <ul class="q-list">
                <?php foreach ($questoin as $q) { ?>
                        <li><?=$q->question?> </li>
                        <li class="ans">
                            <?php 
                                require_once "libs/answer.php";
                                $answers = new Answer($dbh);
                                if (!$answer = $answers->fetchAnswer($q->id)) {
                                    ?><i>No answer availale ! </i> <a href="#" onclick="answerNow(<?=$q->id?>)" class="btn"> Answer Now </a> <?php
                                }else{
                                    $ans =  $answer->answer;
                                    echo $ans;

                                }
                    ?> </li>
                <?php }
                    ?>
                </ul>
            </div>
            <?php   
        }else{
            echo "<div class='questions'>Nothing found !</div>";
        }
    }else{
        echo "Nothing found !";
    }
?>