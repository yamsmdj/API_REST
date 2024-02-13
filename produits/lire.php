<?php
header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Acces-Control-Allow-Methods: GET");
header("Acces-Control-Max-Age: 3600");
header("Acces-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
}else{
    http_response_code(405);
    echo json_encode(["message" => "Error Method Authorized"]);
};