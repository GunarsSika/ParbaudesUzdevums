<?php
    session_start();
    include 'includes/dbh.inc.php';
    include 'includes/tests.inc.php';
    include 'includes/viewtests.inc.php';
    $questions = new ViewTests();
    $correctAnswers = $questions->getCorrectAnswers(); //Izsauc metodi, kura atgriež pareizi atbildēto jautājumu skaitu
    $totalCount = $_SESSION['TotalQuestionCount']; //No sesijas mainīgā iegūst kopējo testa jautājumu skaitu
    $userName = $_SESSION['UserName'] //No sesijas mainīgā iegūst lietotāja ievadīto vārdu
?>

<!DOCTYPE>
<html id="mainWindow">
    <head>
        <link rel='stylesheet' type='text/css' href='style.php' /> 
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <form method="POST" targer="">
            <p>
            <?php
                echo '<div id="ThankYouDiv">';
                echo '<p id="ThankYouText">Paldies, '.$userName.'!</p>'; //Izvada tekstu ar lietotāja vārdu, pielietojot attiecīgo stilu
                echo "<p>";
                echo '<p id="ThankYouAswerCount">Tu pareizi atbildēji uz '.$correctAnswers.' no '.$totalCount.' jautājumiem</p>';
                //izvada beigu rezultātu
                echo "</div>";
            ?>
        </form>
    </body>
</html>
