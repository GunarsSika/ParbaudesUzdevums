<?php
    session_start();
    include 'includes/dbh.inc.php';
    include 'includes/tests.inc.php';
    include 'includes/viewtests.inc.php';
    if(isset( $_POST['selectedAnswer'] )) {
        $_SESSION['SelectedAnswer'] = $_POST['selectedAnswer']; //Tiek iegūts izvēlētās atbildes id no question.php vai 
        //nextQuestion.php un ielikts sesijas mainīgajā
        $answer = new ViewTests();
        $answer->saveUsersAnswer(); //izsauc metodi, kura saglabā lietotāa atbildi
        return; 
    }
?>
