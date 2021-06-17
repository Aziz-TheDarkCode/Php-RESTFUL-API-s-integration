<?php

// use function PHPSTORM_META\type;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');

    include_once("../../config/Database.php");
    include_once("../../models/faculty.php");


    $database = new Database();
   $db = $database->connect();

    $faculty = new Faculty($db);

    //Get students from the database
    $result = $faculty->read();

    
    $datas =$result->fetchAll(PDO::FETCH_ASSOC);
    
    $faculty_array=array() ;

    foreach ($datas as $data => $value) 
    {
        extract($value);            
        $faculty_row = array(

            'id' => $id,
           'name' => $name,
           'duration' =>$duration,
           'description' =>$description,
           'image' => $image,
    
        );
        array_push($faculty_array,$faculty_row);
    }
        echo(json_encode($faculty_array));
        
?>
