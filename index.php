<?php
    session_start();
    include 'includes/dbh.inc.php';
    include 'includes/tests.inc.php';
    include 'includes/viewtests.inc.php';
    
    $users = new ViewTests();
    $tests = $users->showAllTests();
    
    if($_POST){
        //Validācija, kuras laikā pārbauda, vai lietotājs ir ievadījis vārdu, kas ir garāks par 2 simboliem un īsāks par 50 simboliem
        $errors = array();
        
        if(empty($_POST['userName'])){
            $errors['userName1'] = "Lūdzu, ievadiet Jūsu vārdu!";
        }
        
        if(!empty($_POST['userName']) && strlen($_POST['userName']) < 2){
            $errors['userName2'] = "Vārdam jābūt garākam par 2 burtiem!";
        }
        
        if(strlen($_POST['userName']) > 50){
            $errors['userName2'] = "Vārds nevar būt garāks par 50 simboliem!";
        }
        //Tiek pārbaudīts, vai lietotājs ir izļējies kādu no testiem
        if($_POST['testName'] == "0"){
            $errors['testName1'] = "Lūdzu, izvēlieties testu!";
        }
        //Ja validācija ir iezieta, vajadzīgo informāciju saglabā, pretējā gadījumā tiek parādīti kļūdu paziņojumi 
        //un lietotājs netiek nārnavigēts uz nākamo logu
        if(count($errors) == 0){
            $_SESSION['UserName'] = $_POST['userName'];            
            $_SESSION['TestName'] = $_POST['testName'];
            $users->saveUsersName();
            header("Location: questions.php");
            exit();
        }
    }

?>

<!DOCTYPE>
<html id="mainWindow">
    <head>
        <meta charset="utf-8" />
        <link rel='stylesheet' type='text/css' href='style.php' />
        <title></title>
    </head>
    <body id="indexInput">
        <form method="POST" targer="">
            <p id="MainWindowText">Testa uzdevums "SIA" Printful</p>
            <p>
            <input placeholder="Ievadi savu vārdu" type="text" name="userName" id="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>">
            </p>
            <p id="errorText"><?php if(isset($errors['userName1'])) echo $errors['userName1']; ?></p>
            <p id="errorText"><?php if(isset($errors['userName2'])) echo $errors['userName2']; ?></p>
            
            <p>
            <select name="testName" id="testName">
                <option value="0" <?php if(isset($_POST['testName']) && $_POST['testName'] == "0") echo 'selected= "selected"';?>>Izvēlies testu</option>
                <?php foreach($tests as $test) { ?>
                    <option value="<?=$test['TestId'] ?>" <?php if(isset($_POST['testName']) && $_POST['testName'] == $test['TestId']) echo 'selected= "selected"';?>><?= $test['Title'] ?></option>
                <?php } ?>
            </select>
            </p>
            <p id="errorText"><?php if(isset($errors['testName1'])) echo $errors['testName1']; ?></p>
            <div id="buttonDiv">
                <button class="QuestionSubmitButton" type="submit" value="Submit">Sākt</button>
            </div>
            </p>
            <p id="AuthorName">Autors: Gunārs Sīka</p>
        </form>
    </body>
</html>
