<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    require_once '../config/config.php';
    require_once '../models/Produits.php';

    // Instancie la BDD
    $database = new Database();
    $db = $database->getPDOLink();
    
    // Instancie les produits
    $medicament = new Produits($db);

    // recupere les données
    $stmt = $medicament->lire();
    if($stmt->rowCount() > 0){
        $tableauMedicaments = [];
        $tableauMedicaments['medicaments'] = [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $med = [
                "id" => $id,
                "nom" => $nom,
                "img" => $img,
                "prix" => $prix,
                "pays_id" => $pays_id
            ];

            $tableauMedicaments['medicaments'][] = $med ;
        }
        http_response_code(200);
        //on encode en json et on envoie ->
        echo json_encode($tableauMedicaments) ;
    }
}else{
    http_response_code(405);
    echo json_encode(["message" => "Error Method Authorized"]);
};