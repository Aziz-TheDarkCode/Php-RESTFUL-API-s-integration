<?php

    class Admin
    {
		private $conn;
		private $table="admin";

 
         public $id;
		  public $name;
		  public $mail;
		 public $password;
		 
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
          $this->password = $row['password'];
		 }
        }			 
 
 
	       
?>