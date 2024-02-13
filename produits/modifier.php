<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    require_once '../config/config.php';
    require_once '../models/Produits.php';

    // Instancie la BDD
    $database = new Database();
    $db = $database->getPDOLink();
    
    // Instancie les produits
    $medicaments = new Produits($db);

    // recupere les données
    $donnees = json_decode(file_get_contents("php://input"));
    if (!empty($donnees->id) && !empty($donnees->nom) && !empty($donnees->img) && !empty($donnees->prix) && !empty($donnees->pays_id)) {
        $medicaments->id = $donnees->id;
        $medicaments->nom = $donnees->nom;
        $medicaments->img = $donnees->img;
        $medicaments->prix = $donnees->prix;
        $medicaments->pays_id = $donnees->pays_id;
            if ($medicaments->modifier()) {
                http_response_code(200);
                echo json_encode(["message" => "modification reussi"]);
            }else{
                http_response_code(503);
                echo json_encode(["message" => "modification echouer"]);
            }
    }else{
    http_response_code(405);
    echo json_encode(["message" => "Error Method Authorized"]);
    }
}