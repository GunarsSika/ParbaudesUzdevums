<?php

class Dbh{
    
    private $servername;   
    private $username;
    private $password;
    private $dbname;
    private $charset;
    
    protected function connect(){
        //ŠEIT JĀIEVADA SERVERA NOSAUKUMS, LIETOTĀJVĀRDS SERVERA LIETOTĀJAM UN PAROLE!
        $this->servername = "localhost"; //servera nosaukums. Uzdevuma taisīšanas gadījumā - localhost,
                                        //jo uzdevums tika veikts izmantojot WAMP serveri
        $this->username = "root"; //lietotājvārds
        $this->password = ""; //lietotāja parole
        $this->dbname = "gunarssika"; //datubāzes nosaukms
        $this->charset = "utf8";
        
        try{
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname; 
            //Izveido PDO savienojumu ar datubāzi.
            $pdo = new PDO($dsn, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); //Lai varētu parādīt no datubāzes iegūtos latviešu burtus, pievieno pēdējo atribūtu
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(PDOException $e){
            echo "Connection failed: ".$e->getMessage();
        }
    }

}

