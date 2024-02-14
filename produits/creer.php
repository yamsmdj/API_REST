<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../config/config.php';
    require_once '../models/Produits.php';

    // Instancie la BDD
    $database = new Database();
    $db = $database->getPDOLink();
    
    // Instancie les produits
    $medicaments = new Produits($db);

    // recupere les données
    $donnes = json_decode(file_get_contents("php://input"));
    if (!empty($donnes->nom) && !empty($donnes->img) && !empty($donnes->prix) && !empty($donnes->pays_id)) {
        $medicaments->nom = $donnes->nom;
        $medicaments->img = $donnes->img;
        $medicaments->prix = $donnes->prix;
        $medicaments->pays_id = $donnes->pays_id;
        if ($medicaments->creer()) {
            http_response_code(201);
            echo json_encode(["message" => "Ajout reussi"]);
        }else{
            http_response_code(503);
            echo json_encode(["message" => "Ajout echouer"]);
        } 
    }

}else{
    http_response_code(405);
    echo json_encode(["message" => "Error Method Authorized"]);
}
