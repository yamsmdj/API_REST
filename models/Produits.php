<?php

class Produits{

    private $connexion;
    private $table ="medicaments";

    public $id;
    public $name;
    public $path_img;
    public $price;
    public $pays_id;



public function __construct($db){
    $this->connexion = $db ;
}

public function lire(){
    $sql = "SELECT medicaments.* , pays.name FROM " . $this->table . "INNER JOIN pays ON medicaments.pays_id = pays.id ORDER BY medicaments.created_at DESC";
    $requete= $this->connexion->prepare($sql);
    $requete->execute();
    return $requete;

}



}