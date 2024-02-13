<?php

class Produits{

    private $connexion;
    private $table ="medicaments";

    public $id;
    public $nom;
    public $img;
    public $prix;
    public $pays_id;
    public $created_at;



public function __construct($db){
    $this->connexion = $db ;
}

public function lire(){
    $sql = "SELECT medicaments.* , pays.pays FROM " . $this->table . " medicaments INNER JOIN pays ON medicaments.pays_id = pays.id ORDER BY medicaments.created_at DESC";
    $requete= $this->connexion->prepare($sql);
    $requete->execute();
    return $requete;

}


public function lireUn(){
    $sql = "SELECT *, pays.pays  FROM" . $this->table . "m INNER JOIN pays ON m.pays_id = pays.id WHERE m.id = :currentID LIMIT 0,1";

    $requete= $this->connexion->prepare($sql);
    $requete->bindParam(":currentID", $this->id);

    $requete->execute();
    return $requete;
} 

public function creer(){

    $sql = "INSERT INTO " . $this->table . " SET nom=:nom , img=:img , prix=:prix, pays_id=:pays_id";

    $requete = $this->connexion->prepare($sql);

    $this->nom=htmlspecialchars(strip_tags($this->nom));
    $this->img=htmlspecialchars(strip_tags($this->img));
    $this->prix=htmlspecialchars(strip_tags($this->prix));
    $this->pays_id=htmlspecialchars(strip_tags($this->pays_id));


    $requete->bindParam(":nom", $this->nom);
    $requete->bindParam(":img" , $this->img);
    $requete->bindParam(":prix" , $this->prix);
    $requete->bindParam(":pays_id" , $this->pays_id);
    
    if($requete->execute()){
        return true;
    }
    return false;
}

public function supprimer(){
    $sql = "DELETE FROM " . $this->table . " WHERE id = ?";

    $requete = $this->connexion->prepare($sql);
    $this->id=htmlspecialchars($this->id);
    $requete->bindParam(1, $this->id);

    if ($requete->execute()) {
        return true;
    }
    return false;
}

public function modifier(){
    $sql = "UPDATE " . $this->table . " SET id=:id , nom=:nom , img=:img , prix=:prix, pays_id=:pays_id WHERE id = :id";

    $requete = $this->connexion->prepare($sql);

    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->nom=htmlspecialchars(strip_tags($this->nom));
    $this->img=htmlspecialchars(strip_tags($this->img));
    $this->prix=htmlspecialchars(strip_tags($this->prix));
    $this->pays_id=htmlspecialchars(strip_tags($this->pays_id));

    $requete->bindParam(":id", $this->id);
    $requete->bindParam(":nom", $this->nom);
    $requete->bindParam(":img" , $this->img);
    $requete->bindParam(":prix" , $this->prix);
    $requete->bindParam(":pays_id" , $this->pays_id);

    if ($requete->execute()) {
        return true;
    }
    return false;
    }


}
