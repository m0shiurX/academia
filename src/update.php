    <?php
    include "components/headx.php";

    if (isset($_POST['semister'])) {
        require_once "libs/account.php";        
        $semisterUpdate = new Account($dbh);
        $currentSemister = 1;
        if ($semisterUpdate->updateStudentSemister($_POST['semister'], $currentSemister)) {
            echo "Updated";
        }else{
            echo " error";
            echo $_POST['semister'];
            echo $currentSemister;
        }
    }