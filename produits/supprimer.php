<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    require_once '../config/config.php';
    require_once '../models/Produits.php';

    // Instancie la BDD
    $database = new Database();
    $db = $database->getPDOLink();
    
    // Instancie les produits
    $medicaments = new Produits($db);

    // on recupere l'element a supprimer
    $donnees = json_decode(file_get_contents("php://input"));
    if (!empty($donnees->id) && $medicaments->id = $donnees->id) {
        if($medicaments->supprimer()){
            http_response_code(200);
            echo json_encode(["message" => "Suppression succes"]);
        }else{
            http_response_code(503);
            echo json_encode(["message" => "Ajout echouer"]);
        }
    }
}else{
    http_response_code(405);
    echo json_encode(["message" => "Error Method Authorized"]);
}