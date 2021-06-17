<?php

// use function PHPSTORM_META\type;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once("../../config/Database.php");
include_once("../../models/student.php");


    $database = new Database();
   $db = $database->connect();

    $student = new Students($db);

    $data = json_decode(file_get_contents("php://input"));

    $student->mail= $data->mail;
    $student->password = $data->password;
    //Get students from the database
    $result = $student->read_single();

    $data = $result->fetch(PDO::FETCH_ASSOC);
        if($data)
        {
            echo(json_encode($data));
        }else{
            echo(json_encode("Adresse mail ou Mot de passe incorrect ."));
        }
       
        
?>
