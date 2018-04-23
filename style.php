<?php
    header("Content-type: text/css");
    ?>

#userName{
    color: #00001a;
    width: 100%;
    border-radius: 4px;
    font-size: 16px;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}

#indexInput {
    width: 200px;
    height: 200px;
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}

#testName{
    table-layout: fixed;
    width: 100%;
    border-radius: 4px;
    font-size: 16px;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}

#errorText{
    text-align: center;
    font-weight: bold;
    color: red;
    font-size: 16px;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}

#buttonDiv{
    text-align: center;
}

#mainWindow{
    background-color: lightblue;
}

#MainWindowText{
    font-size: 24px;
    text-align: center;
    font-weight: bold;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}

#AuthorName{
    font-size: 10px;
    text-align: right;
    font-weight: bold;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}

#questions{
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}

#questionText{
    font-size: 30px;
    text-align: right;
    text-align: center;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}

#MainButton{
    margin-top: 50px;
    margin-left: 35%;    
    margin-right: 35%;
    width: 30%;
}

.QuestionSubmitButton{
    text-align: center;
    margin: auto;
    width: 40%;
    font-weight: bold;
    padding: 10px;
    border-radius: 4px;
    font-size: 16px;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
    background-color: #ffffcc;
    display:inline-block;
    margin-right: 5%;
    margin-left: 5%;
    margin-bottom: 30px;
}

.QuestionSubmitButton:focus {
    border: 2px solid black;
}

.QuestionSubmitButton:hover{
    background: #f2f2f2; 
    }

.answerButtonClass{
    display: table;
    width: 60%;
    margin-left: 20%;
    margin-right: 20%;
}

#progressbar {
    width: 20%;
    height: 10px;
    border-radius: 10px;
    border: solid 1px #000000;
    overflow: hidden;
    text-align: center;
    margin-bottom: 20px;
    margin-top: 40px;
    margin: auto;
}
#completed {
    position: relative;
    height: 100%;
    background-color: #ffbf80;
}

#ThankYouText{
    font-size: 30px;
    text-align: right;
    text-align: center;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}

#ThankYouAswerCount{
    font-size: 20px;
    text-align: right;
    text-align: center;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}

#ThankYouDiv{
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}

@media screen and (max-width: 480px) {
    #questionText { 
        font-size: 20px;
    }
    
    .QuestionSubmitButton{
        font-size: 10px;
        display: block;
        margin: auto;
        margin-bottom: 10px;
    }
    
    #MainButton{
        margin-top: 10px;
    }
    
    #ThankYouText{
        font-size: 20px;
    }
    
    #ThankYouAswerCount{
        font-size: 20px;
    }
}