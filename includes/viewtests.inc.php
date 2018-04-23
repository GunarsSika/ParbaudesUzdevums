<?php

class ViewTests extends Tests{

    
    public function showAllTests(){
        $datas = $this->getAllTests(); //Izsauc metodi, kura atgriež visu testu nosaukumus
        return $datas;
    }
    
    public function saveUsersName(){
        $this->saveUsersInformation(); //Izsauc metodi, kura saglabā lietotāja informāciju
        return;
    }
    
    public function getQuestionCount(){
        $number = $this->getNumberOfQuestions(); //Izsauc metodi, kura iegūst jautājumu skaitu
        return $number;
    }
    
    public function getQuestion(){
        $question = $this->getNextQuestion(); //Izsauc metodi, kura iegūs jautājuma tekstu
        return $question;
    }
    
    public function getAnswers(){
        $answers = $this->getAnswerSet();  //Izsauc metodi, kura iegūst atbilžu variantus
        return $answers;
    }
    
    public  function saveUsersAnswer(){
        $this->saveAnswerInformation(); //Izsauc metodi, kura saglabā lietotāja atbildi
        return;
    }
    
    public function getCorrectAnswers(){
        $correctAnswers = $this->getCorrectAnswerCount(); //Izsauc metodi, kura saglabā pareizi atbildēto jautājumu skaitu
        return $correctAnswers;
    }
}

