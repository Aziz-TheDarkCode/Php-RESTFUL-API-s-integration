<?php
    class Faculty
    {
           private $conn;
           private $table="faculty";

    
           private $id;
            private $description;
            private $name;
            private $duration;
            private $image;

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

    }

          
?>