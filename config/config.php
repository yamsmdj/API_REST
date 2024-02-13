<?php

class Database{
    private $host = "localhost";
    private $dbname = "API_REST";
    private $dbuser = "root";
    private $dbpass = '';
    public $connexion ;

public function getPDOLink(){

    $this->connexion = null ;

    try{
        $this->connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->dbuser, $this->dbpass) ; 
        $this->connexion->exec("set names utf8");
        echo 'connexion reussi';
    }catch(PDOException $e){
        echo 'Erreur de connexion' . $e->getMessage();
    }
    return $this->connexion;
    }

}

