<?php
    session_start();
    //Pēc loģikas šeit ir tas pats, kas questions.php, tikai bez atbilžu saglabāšanas izsaukšanas loģikas.
    include 'includes/dbh.inc.php';
    include 'includes/tests.inc.php';
    include 'includes/viewtests.inc.php';
    $questions = new ViewTests();
    $_SESSION['CurrentQuestion'] = $_POST['nextQuestion'];
    $current = $_SESSION['CurrentQuestion'];
    $question = $questions->getQuestion();
    $answers = $questions->getAnswers();
    $total = $_SESSION['TotalQuestionCount'];
    $completed  = floor(($current/$total)*100);
    if($question != null && $answers != null){
        echo "<p>";
        echo '<p id="questionText">',$question["QuestionText"],'</p>';
        echo "<p>";
        echo '<div class="answerButtonClass">';
        foreach($answers as $answer) { 
            echo '<Button class="QuestionSubmitButton" type="submit" name="answerButton" id="',$answer['answerId'],'">',$answer['Text'],'</Button>';
        } 
        echo "</div>";
        echo "<p>";
        echo "<div id='progressbar'>";
        echo "<div id='completed' style='width: ".$completed."% !important;'></div>";
        echo "</div>";
        echo '<Button class="QuestionSubmitButton" id="MainButton" type="submit" name="submitButton">',"Nākamais jautājums",'</Button>';
    }
    else{
        echo "Nav jautājuma!";
    }
?>

