<?php

    class Students
    {
		private $conn;
		private $table="student";

 
         public $id;
		  public $name;
		  public $mail;
		  
		  public $date_of_birth;
		 public $faculty;
		 public $year;
		 public $password;
		 public $status;
		 

		 public function __construct($db)
		 {
				 $this->conn = $db;
		 }

		 public function read()
		 {
			   $query ="SELECT * FROM $this->table";

			   $stmt = $this->conn->prepare($query);
			   

		 // Execute query
		 $stmt->execute();

		 return $stmt; 
		 }
		 public function read_single()
		 {
			   $query ="SELECT * FROM $this->table WHERE mail=:mail  AND password=:password";

			   $this->mail = htmlspecialchars(strip_tags($this->mail));
			   $this->password = htmlspecialchars(strip_tags($this->password));

			  $stmt = $this->conn->prepare($query);

			  $stmt->bindParam(":mail" , $this->mail);
			  $stmt->bindParam(":password" , $this->password);

		 // Execute query
		 $stmt->execute();

		 return $stmt; 

		 $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->name = $row['name'];
          $this->mail = $row['mail'];
          $this->date_of_birth = $row['date_of_birth'];
          $this->password = $row['password'];
          $this->faculty = $row['faculty'];
          $this->year= $row['year'];
		 }
			 
 public function create(){
	 
	$query = 'INSERT INTO ' . $this->table . ' SET name = :name, date_of_birth = :dob, mail = :mail, password = :password, faculty=:faculty, year=:year';

	 $stmt = $this->conn->prepare($query);

	 // Sanitize datas
	 $this->name = htmlspecialchars(strip_tags($this->name));
	 $this->mail = htmlspecialchars(strip_tags($this->mail));
	 $this->date_of_birth = htmlspecialchars(strip_tags($this->date_of_birth));
	 $this->faculty = htmlspecialchars(strip_tags($this->faculty));
	 $this->year = htmlspecialchars(strip_tags($this->year));

	 //Bind values
	 $stmt->bindParam(':name' , $this->name);
	 $stmt->bindParam(':dob' , $this->date_of_birth);
	 $stmt->bindParam(':mail' , $this->mail);
	 $stmt->bindParam(':password' , $this->password);
	 $stmt->bindParam(':faculty' , $this->faculty);
	 $stmt->bindParam(':year' , $this->year);
										 
	 if($stmt->execute()) {
		 return true;
	 }
 
	 // Print error if something goes wrong
	 printf("Error: %s.\n", $stmt->error);
 
	 return false;
	 }
	 public function update()
 {
	 $query = 'UPDATE ' . $this->table . ' SET name = :name, mail = :mail, date_of_birth = :dob, faculty = :faculty, year=:year,password=:password WHERE id=:id';

	 $stmt = $this->conn->prepare($query);

	 // Sanitize datas
	 $this->name = htmlspecialchars(strip_tags($this->name));
	 $this->mail = htmlspecialchars(strip_tags($this->mail));
	 $this->date_of_birth = htmlspecialchars(strip_tags($this->date_of_birth));
	 $this->faculty = htmlspecialchars(strip_tags($this->faculty));
	 $this->year = htmlspecialchars(strip_tags($this->year));

	 //Bind values
	 $stmt->bindParam(':name' , $this->name);
	 $stmt->bindParam(':mail' , $this->mail);
	 $stmt->bindParam(':dob' , $this->date_of_birth);
	 $stmt->bindParam(':faculty' , $this->faculty);
	 $stmt->bindParam(':password' , $this->password);
	 $stmt->bindParam(':year' , $this->year);
	 $stmt->bindParam(':id' , $this->id);
										 
	 if($stmt->execute()) {
		 return true;
	 }
 
	 // Print error if something goes wrong
	 printf("Error: %s.\n", $stmt->error);
 
	 return false;
	 }
 }
 
	       
?>