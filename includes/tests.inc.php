<?php
class Tests extends Dbh{
    
    protected function getAllTests(){
        //Izsauc procedūru, kura atlasa visus datubāzē esošos testus
        $stmt = $this->connect()->prepare("CALL TestListGet()");
        $stmt->execute();
        return $stmt;
    }
    
    protected function saveUsersInformation(){
        //Izsauc procedūru, kura saglabā lietotāja ievadīto vārdu un kā vērtību no datubāzes,
        //atgriež ievietotā vārda identifikatoru, lai to varētu izmantot vēlāk 
        $userName = $_SESSION['UserName'];
        $this->connect()->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
        $stmt = $this->connect()->prepare("CALL UserInfoSave(?)");
        $stmt->bindParam(1,$userName, PDO::PARAM_STR, 4000);  
        $stmt->execute();
        foreach ($stmt as $value) {
            $_SESSION['UserId'] = $value['LAST_INSERT_ID()'];
        }
        return;
    }
    
    protected function getNumberOfQuestions(){
        //Izsauc procedūru, kura atgriež kopējo testa jautājumu skaitu
        $testId = ($_SESSION['TestName']);
        $this->connect()->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
        $stmt = $this->connect()->prepare("CALL QuestionCountGet(?)");
        $stmt->bindParam(1,$testId, PDO::PARAM_STR, 4000);
        $stmt->execute();
        foreach ($stmt as $value) {
            return $value['QuestionTotal'];
        }
    }
    
    protected function getNextQuestion(){
        //Isauc procedūru, kura iegūst no datubāzes jautājuma tekstu
        //kā parametrus padodot testa identifikatoru un jautājuma numuru
        $questionNumber = ($_SESSION['CurrentQuestion']);
        $testId = ($_SESSION['TestName']);
        $this->connect()->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
        $stmt = $this->connect()->prepare("CALL QuestionGet(?, ?)");
        $stmt->bindParam(1,$questionNumber, PDO::PARAM_STR, 4000);
        $stmt->bindParam(2,$testId, PDO::PARAM_STR, 4000);
        $stmt->execute();
        
        foreach ($stmt as $value) {
            $_SESSION['QuestionId'] = $value['QuestionId'];
            return $value;
        }
    }
    
    protected function getAnswerSet(){
        //Izsauc procedūru, kura atgriež atbilžu variantus attiecīgajam jautājumam
        $questionId = $_SESSION['QuestionId'];
        $this->connect()->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
        $stmt = $this->connect()->prepare("CALL AnswerSetGet(?)");
        $stmt->bindParam(1,$questionId, PDO::PARAM_STR, 4000);
        $stmt->execute();
        return $stmt;
    }
    
    protected function saveAnswerInformation(){
        //Izsauc procedūru, kura saglabā lietotāja atbildi datubāzē
        $userId = $_SESSION['UserId'];
        $questionId = $_SESSION['QuestionId'];
        $answerId = $_SESSION['SelectedAnswer'];
        $testId = ($_SESSION['TestName']);
        $this->connect()->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
        $stmt = $this->connect()->prepare("CALL AnswerInformationSave(?, ?, ?, ?)");
        $stmt->bindParam(1,$userId, PDO::PARAM_STR, 4000);
        $stmt->bindParam(2,$testId, PDO::PARAM_STR, 4000);
        $stmt->bindParam(3,$questionId, PDO::PARAM_STR, 4000);
        $stmt->bindParam(4,$answerId, PDO::PARAM_STR, 4000);
        $stmt->execute();
    }
    
    protected function getCorrectAnswerCount(){
        //Izsauc procedūru, kura atgriež pareizi atbildēto jautājumu skaitu
        $userId = $_SESSION['UserId'];
        $testId = ($_SESSION['TestName']);
        $this->connect()->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
        $stmt = $this->connect()->prepare("CALL CorrectAnswerCountGet(?)");
        $stmt->bindParam(1,$userId, PDO::PARAM_STR, 4000);
        $stmt->execute();
        $correctAnswerCount = 0;
        foreach ($stmt as $value) {
            $correctAnswerCount = $value['Correct'];
        }
        //Izsauc procedūru, kura saglabā, uz cik jautājumiem lietotājs ir atbildējis pareizi
        $this->connect()->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
        $stmt = $this->connect()->prepare("CALL SaveResults(?, ?, ?)");
        $stmt->bindParam(1,$userId, PDO::PARAM_STR, 4000);
        $stmt->bindParam(2,$testId, PDO::PARAM_STR, 4000);
        $stmt->bindParam(3,$correctAnswerCount, PDO::PARAM_STR, 4000);
        $stmt->execute();
        
        return $correctAnswerCount;
    }
}

