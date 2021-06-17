<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/student.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $student= new Students($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

$student->name= $data->name;
$student->mail = $data->mail;
$student->date_of_birth= $data->date_of_birth;
$student->faculty = $data->faculty;
$student->password = $data->password;
$student->year = $data->year;

  // Create post
  if($student->create()) {
    echo json_encode(
      array('message' => 'Post Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Created')
    );
  }