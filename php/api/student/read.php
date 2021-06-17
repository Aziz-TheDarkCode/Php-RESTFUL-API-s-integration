<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');

    include_once("../../config/Database.php");
    include_once("../../models/student.php");


    $database = new Database();
   $db = $database->connect();

    $student = new Students($db);

    //Get Multiple students from the database
    $result = $student->read();
    
    $datas =$result->fetchAll(PDO::FETCH_ASSOC);
    
    $student_array=array() ;

    foreach ($datas as $data => $value) 
    {
        extract($value);            
        $student_row = array(

            'id' => $id,
           'name' => $name,
           'mail' =>$mail,
           'date_of_birth' => $date_of_birth,
           'password' => $password,
            'faculty' => $faculty,
            'year' => $year,
        );
        array_push($student_array,$student_row);
    }
        echo(json_encode($student_array));

    // Get One student from the data
?>
