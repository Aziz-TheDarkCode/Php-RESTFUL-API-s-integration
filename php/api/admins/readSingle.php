<?php

// use function PHPSTORM_META\type;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once("../../config/Database.php");
include_once("../../models/admin.php");


    $database = new Database();
   $db = $database->connect();

    $admin= new Admin($db);

    $data = json_decode(file_get_contents("php://input"));

    $admin->mail= $data->mail;
    $admin->password = $data->password;
    //Get students from the database
    $result = $admin->read_single();

    $data = $result->fetch(PDO::FETCH_ASSOC);
        if($data)
        {
            echo(json_encode($data));
        }else{
            echo(json_encode("Adresse mail ou Mot de passe incorrect ."));
        }
       
        
?>
