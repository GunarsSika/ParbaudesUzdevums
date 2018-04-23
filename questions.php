<?php
    session_start();
    include 'includes/dbh.inc.php';
    include 'includes/tests.inc.php';
    include 'includes/viewtests.inc.php';
    $questions = new ViewTests();
    $count = $questions->getQuestionCount();
    $_SESSION['TotalQuestionCount'] = $count;
?>

<!DOCTYPE>
<html id="mainWindow">
    <head>
        <link rel='stylesheet' type='text/css' href='style.php' />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script>
            $(document).ready(function(){ //Kad lapa ielādējas, tiek uzzsetots tagadējais jautājums kā 1
                var currentQuestion = 1;
                var totalQuestionCount = <?php echo json_encode($_SESSION['TotalQuestionCount']) ?>;
                    //saglabā kopējo jautājumu skaitu, lai pēc pēdējā jautājuma pārnavigētu
                    //uz nākamo skatu
                    var buttonValue = null;
                    $(document).on( 'click', 'button[name=answerButton]', function(){
                        buttonValue = this.id; //Nospiežot kādu no atbilžu variantiem, tiek iegūts atbilžu arianta id,
                        //lai to sagabatu datubāze.
                    }); 
                    $(document).on('click','button[name=submitButton]', function(){
                        //Nospiežot iesniegt pogu, tiek pārbaudīts, vai lietotājs ir izvēlējies kādu no atbilžu variantiem.
                        //Ja tā ir, tiek pārbaudīts, vai ir sasniegts pēdējais testa jautājums
                        if(buttonValue !== null){
                            if(currentQuestion < totalQuestionCount){
                                //Ja šis nav pēdējais jautājums, lietotāja atbilde tiek saglabāta datbāzē
                                //ielādējot useranswers.php
                            currentQuestion = currentQuestion + 1;           
                            
                            $("#questions").load("useranswers.php",{
                                selectedAnswer: buttonValue
                            });
                                //Tiek automātiski atjaunots jautājums un atbilžu varianti pilnībā nepārlādējot lapu
                            $("#questions").load("nextQuestion.php",{
                                nextQuestion: currentQuestion
                            });
                            buttonValue = null;
                            }
                            else{
                            //Pēdējais jautājums
                            //izsauc pēdējās atbildes saglabāšanu un pārnavigēju uz rezultātu skatu
                            $("#questions").load("useranswers.php",{
                                selectedAnswer: buttonValue
                            });
                            window.location.href = "results.php";
                            }
                        }
                        
                    })
            });
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title></title>
    </head>
    <body>
        <div id="questions">
            <?php
                $currentQuestion = 1;
                $_SESSION['CurrentQuestion'] = $currentQuestion;
                $question = $questions->getQuestion(); //Izsaucu metodi, kura atgriež jautājuma tekstu
                $answers = $questions->getAnswers(); //Izsacu metodi, kura atgriež atbilžu variantus
                $completed  = floor(($currentQuestion/$count)*100); //Izrēķinu, cik procenti no testa ir atbildēti, to parādu prograssbārā
                if($question != null && $answers != null){
                    //Ja no datubāzes ie iegūts gan jautājums, gan atbildes, tos parāda uz ekrāna
                    echo "<p>";
                    echo '<p id="questionText">',$question["QuestionText"],'</p>';
                    echo "<p>";
                    echo '<div class="answerButtonClass">';
                    //Atbilžu ariantu parādīšanai izmanto ciklu, jo nosacījumos bija teikts, ka
                    //jautājumam var būt neierobežoti daudz atbilžu varinatu
                    foreach($answers as $answer) { 
                        echo '<Button class="QuestionSubmitButton" type="submit" name="answerButton" id="',$answer['answerId'],'">',$answer['Text'],'</Button>';
                    } 
                    echo "</div>";
                    echo "<p>";
                    echo "<div id='progressbar'>";
                    echo "<div id='completed' style='width: ".$completed."% !important;'></div>"; //progresbārs
                    echo "</div>";
                    echo '<Button class="QuestionSubmitButton" id="MainButton" type="submit" name="submitButton">',"Nākamais jautājums",'</Button>';
                    //Poga, kura iesniedz atbildi
                    
                }
                else{
                    echo "Nav jautājuma!";
                }
            ?>
        </div>
    </body>
</html>

